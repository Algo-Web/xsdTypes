<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\EnumerationTrait;
use AlgoWeb\xsdTypes\Facets\PatternTrait;
use AlgoWeb\xsdTypes\Facets\WhiteSpaceTrait;

/**
 * The type xsd:anySimpleType is the base type from which all other built-in types are derived.
 * Any value (including an empty value) is allowed for xsd:anySimpleType.
 * handles facets enumeration, length, maxLength, minLength, pattern
 *
 * @package AlgoWeb\xsdTypes
 */
abstract class xsAnySimpleType
{
    use WhiteSpaceTrait, PatternTrait, EnumerationTrait;
    /**
     * @Exclude
     * @var boolean indicates if value has been fixed.
     */
    protected $fixed = false;

    /**
     * @property mixed $value
     */
    protected $value = null;

    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        if (!$this->fixed) {
            $this->fixValue();
            $this->isOKInternal();
        }
        return $this->value;
    }

    protected function fixValue()
    {
        $this->value = $this->fixWhitespace($this->value);
    }

    protected function isOKInternal()
    {
        $this->checkEnumeration($this->value);
        $this->checkPattern($this->value);
        $this->isOK();
    }

    abstract protected function isOK();
}
