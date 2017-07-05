<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:integer represents an arbitrarily large integer, from which twelve other built-in integer types are
 * derived (directly or indirectly).  An xsd:integer is a sequence of digits, optionally preceded by a + or -
 * sign.  Leading zeros are permitted, but decimal points are not
 * @package AlgoWeb\xsdTypes
 */
class xsInteger extends xsDecimal
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setFractionDigits(0);
        $this->setPatternFacet("[\-+]?[0-9]+");
    }
}
