<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:byte represents an integer between -128 and 127.  An xsd:byte is a sequence of digits, optionally
 * preceded by a + or - sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsByte extends xsShort
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(127);
        $this->setMinInclusive(-128);
    }
}
