<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:nonNegativeInteger represents an arbitrarily large-in-magnitude non-negative integer.  An
 * xsd:nonNegativeInteger is a sequence of digits, optionally preceded by a + sign.  Leading zeros are permitted, but
 * decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsNonNegativeInteger extends xsInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMinInclusive(0);
    }
}
