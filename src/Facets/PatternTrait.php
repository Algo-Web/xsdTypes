<?php
namespace AlgoWeb\xsdTypes\Facets;

trait PatternTrait
{
    /**
     * @Exclude
     * @var string Defines the exact sequence of characters that are acceptable.
     */
    private $pattern = null;

    protected function setPatternFacet($value)
    {
        if (!$this->checkRegexValidPattern($value)) {
            $value = "/" . $value . "/";
            if (!$this->checkRegexValidPattern($value)) {
                throw new \InvalidArgumentException("Invalid regex pattern provided: " . __CLASS__);
            }
        }
        $this->pattern = $value;
    }

    private function checkRegexValidPattern($pattern)
    {
        return (false === @preg_match($pattern, null));
    }


    private function checkPattern($v)
    {
        if (null != $this->pattern) {
            if (!$this->matchesRegexPattern($this->pattern, $v)) {
                throw new \InvalidArgumentException("Assigned value that does not match pattern " . __CLASS__);
            }
        }
    }

    /**
     * Checks a pattern against a string
     *
     * @param  string $pattern the regex pattern
     * @param  string $string the string to check
     * @return bool true if string matches pattern
     */
    private function matchesRegexPattern($pattern, $string)
    {
        $matches = null;
        return (1 == preg_match($pattern, $string, $matches) && $string == $matches[0]);
    }
}
