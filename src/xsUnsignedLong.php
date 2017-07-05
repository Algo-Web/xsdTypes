<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:unsignedLong represents an integer between 0 and 18446744073709551615.  An xsd:unsignedLong is a
 * sequence of digits, optionally preceded by a + sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsUnsignedLong extends xsNonNegativeInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(18446744073709551615);
    }
}
