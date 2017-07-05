<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:unsignedInt represents an integer between 0 and 4294967295.  An xsd:unsignedInt is a sequence of digits,
 * optionally preceded by a + sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsUnsignedInt extends xsUnsignedLong
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(4294967295);
    }
}
