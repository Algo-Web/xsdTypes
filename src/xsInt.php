<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:int represents an integer between -2147483648 and 2147483647.  An xsd:int is a sequence of digits,
 * optionally preceded by a + or - sign.  Leading zeros are permitted, but decimal points are not
 * @package AlgoWeb\xsdTypes
 */
class xsInt extends xsLong
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(2147483647);
        $this->setMinInclusive(-2147483648);
    }
}
