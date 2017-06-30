<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:anySimpleType is the base type from which all other built-in types are derived. Any value (including an empty value) is allowed for xsd:anySimpleType.
 * handles facets enumeration, length, maxLength, minLength, pattern
 *
 * @package AlgoWeb\xsdTypes
 */
abstract class xsAnySimpleType
{
    /**
     * @Exclude
     * @var array Defines a list of acceptable values
     */
    private $enumeration = null;

    /**
     * @Exclude
     * @var integer Specifies the maximum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $maxLength = null;
    /**
     * @Exclude
     * @var integer Specifies the minimum number of characters or list items allowed. Must be equal to or greater than zero
     */
    private $minLength = null;

    /**
     * @Exclude
     * @var string Specifies how white space (line feeds, tabs, spaces, and carriage returns) is handled
     */
    private $whiteSpace = "preserve";
    /**
     * @Exclude
     * @var string Defines the exact sequence of characters that are acceptable
     */
    private $pattern = null;

    /**
     * @property mixed $__value
     */
    private $__value = null;

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->__value = $this->fixValueInteral($value);
    }

    private function fixValueInteral($value)
    {
        return $this->fixValue($this->fixWhitespace($value));
    }
    abstract protected function fixValue($value);
    protected function fixWhitespace($val)
    {
        switch ($this->whiteSpace) {
            case "preserve":
                return $val;
            case "replace":
                return preg_replace('/\s/', ' ', $val);
            case "collapse":
                return preg_replace('/\s+/', ' ', $val);
            default:
                throw new \InvalidArgumentException(__CLASS__ . " Called Fix whitespace with invalid handle operation");
        }
    }
    protected function isOKInternal($value)
    {
        $this->checkEnumeration($value);
        $this->checkMaxLength($value);
        $this->checkMinLength($value);
        $this->checkPattern($value);
        return $this->isOK($value);
    }

    private function checkEnumeration($v)
    {
        if (is_array($this->enumeration) && 0 != count($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " is not " .
                implode(" || ", $this->enumeration)
            );
        }
    }

    private function checkMaxLength($v)
    {
        $stringLen = strlen($v);
        if ($this->maxLength != null) {
            if ($stringLen < $this->maxLength) {
                throw new \InvalidArgumentException(
                    "the provided value for " . __CLASS__ . " is to short MaxLength: "
                    . $this->maxLength
                );
            }
        }
    }

    private function checkMinLength($v)
    {
        $stringLen = strlen($v);
        if ($this->minLength != null) {
            if ($stringLen > $this->minLength) {
                throw new \InvalidArgumentException(
                    "the provided value for " . __CLASS__ . " is to long minLength: "
                    . $this->minLength
                );
            }
        }
    }

    private function checkPattern($v)
    {
        if ($this->pattern != null) {
            if (!$this->matchesRegexPattern($this->pattern, $v)) {
                throw new \InvalidArgumentException("assigned value that dose not match pattern " . __CLASS__);
            }
        }
    }

    /**
     * Checks a pattern against a string
     *
     * @param  string $pattern the regex pattern
     * @param  string $string  the string to check
     * @return bool true if string matches pattern
     */
    private function matchesRegexPattern($pattern, $string)
    {
        $matches = null;
        return (1 == preg_match($pattern, $string, $matches) && $string == $matches[0]);
    }

    abstract protected function isOK($value);

    protected function setLengthFacet($value)
    {
        $this->setMinLengthFacet($value);
        $this->setMaxLengthFacet($value);
    }

    protected function setMinLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->minLength = $value;
    }

    private function checkValidMinMaxLength($value, $min = 0)
    {
        if (((int)$value) != $value) {
            throw new \InvalidArgumentException("length values MUST be castable to int " . __CLASS__);
        }
        if ($min >= $value) {
            throw new \InvalidArgumentException("length values MUST be greater then 0 " . __CLASS__);
        }
    }

    protected function setMaxLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->maxLength = $value;
    }

    protected function setWhiteSpaceFacet($value)
    {
        if (!in_array($value, ["preserve", "replace", "collapse"])) {
            throw new \InvalidArgumentException("Invalid white space handleing method " . __CLASS__);
        }
        $this->whiteSpace = $value;
    }

    protected function setPatternFacet($value)
    {
        if (!$this->checkRegexValidPattern($value)) {
            $value = "/" . $value . "/";
            if (!$this->checkRegexValidPattern($value)) {
                throw new \InvalidArgumentException("Invalid regex Pattern provided: " . __CLASS__);
            }
        }
        $this->pattern = $value;
    }

    private function checkRegexValidPattern($pattern)
    {
        return (@preg_match($pattern, null) === false);
    }
}
