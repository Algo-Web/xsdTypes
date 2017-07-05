<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\DigitsTrait;
use AlgoWeb\xsdTypes\Facets\MinMaxTrait;

/**
 * The type xsd:decimal represents a decimal number of arbitrary precision. Schema processors vary in the number of
 * significant digits they support, but a conforming processor must support a minimum of 18 significant digits.
 * The format of xsd:decimal is a sequence of digits optionally preceded by a sign ("+" or "-") and optionally
 * containing a period. The value may start or end with a period. If the fractional part is 0, then the period and
 * trailing zeros may be omitted. Leading and trailing zeros are permitted, but they are not considered significant.
 * That is, the decimal values 3.0 and 3.0000 are considered equal.
 * @package AlgoWeb\xsdTypes
 */
class xsDecimal extends xsAnySimpleType
{
    use DigitsTrait, MinMaxTrait;

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

    protected function fixValue()
    {
        parent::fixValue();
        $this->value = $this->fixFractionDigits($this->value);
    }

    protected function isOK()
    {
        $this->checkDigitLength($this->value);
        $this->checkFractionDigits($this->value);
        $this->CheckMinMax($this->value);
    }
}
