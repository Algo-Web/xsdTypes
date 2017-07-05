<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:short represents an integer between -32768 and 32767.  An xsd:short is a sequence of digits,
 * optionally preceded by a + or - sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsShort extends xsInt
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(32767);
        $this->setMinInclusive(-32768);
    }
}
