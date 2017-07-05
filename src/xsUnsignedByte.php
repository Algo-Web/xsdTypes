<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:unsignedByte represents an integer between 0 and 255.  An xsd:unsignedByte is a sequence of digits,
 * optionally preceded by a + sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsUnsignedByte extends xsUnsignedShort
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(255);
    }
}
