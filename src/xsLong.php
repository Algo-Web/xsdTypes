<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:long represents an integer between -9223372036854775808 and 9223372036854775807. An xsd:long is a
 * sequence of digits, optionally preceded by a + or - sign.  Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsLong extends xsInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(9223372036854775807);
        $this->setMinInclusive(-9223372036854775808);
    }
}
