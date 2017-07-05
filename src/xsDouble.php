<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\MinMaxTrait;

/**
 * The type xsd:double represents an IEEE double-precision 64-bit floating-point number.  The format of xsd:double
 * values is a mantissa (a number which conforms to the type decimal) followed, optionally, by the character "E"
 * or "e" followed by an exponent.  The exponent must be an integer.  For example, 3E2 represents 3 times 10 to the
 * 2nd power, or 300.  The exponent must be an integer.
 *
 * In addition, the following values are valid: INF (infinity), -INF (negative infinity), and NaN (Not a Number).
 * INF is considered to be greater than all other values, while -INF is less than all other values.  The value NaN
 * cannot be compared to any other values, although it equals itself.
 * @package AlgoWeb\xsdTypes
 */
class xsDouble extends xsAnySimpleType
{
    use MinMaxTrait;

    /**
     * Construct
     *
     * @param double $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
    }

    protected function isOK()
    {
        $this->CheckMinMax($this->value);
    }
}
