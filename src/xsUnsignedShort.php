<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:unsignedShort represents an integer between 0 and 65535.  An xsd:unsignedShort is a sequence of digits,
 * optionally preceded by a + sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsUnsignedShort extends xsUnsignedInt
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(65535);
    }
}
