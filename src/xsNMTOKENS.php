<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * The type xsd:NMTOKENS represents a list of NMTOKEN values separated by whitespace. There must be at least one
 * NMTOKEN in the list.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNMTOKENS extends xsAnySimpleType
{
    use LengthTrait;

    /**
     * Construct
     *
     * @param array $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
        $this->setMinLengthFacet(1);
    }

    protected function fixValue()
    {
        if (is_string($this->value)) {
            $parts = explode(" ", $this->value);
            $this->value = [];
            foreach ($parts as $part) {
                $this->value[] = new xsNMTOKEN($part);
            }
        }
        assert(is_array($this->value), "Somehow, xsNMTOKENs ended up not being an array.");
        foreach ($this->value as $v) {
            $v->fixValue($v);
        }
    }

    protected function isOK()
    {
        if (!is_array($this->value)) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " must be an array of type xsNMTOKEN."
            );
        }
        foreach ($this->value as $v) {
            $v->isOKInternal();
        }
    }
}
