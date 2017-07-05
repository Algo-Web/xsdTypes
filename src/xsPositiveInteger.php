<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:positiveInteger represents an arbitrarily large-in-magnitude positive integer.  An xsd:positiveInteger
 * is a sequence of digits, optionally preceded by a + sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsPositiveInteger extends xsNonNegativeInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMinInclusive(1);
    }
}
