<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\MinMaxTrait;

/**
 * The type xsd:gYear represents a specific calendar year. The letter g signifies "Gregorian." The format of xsd:gYear
 * is CCYY. No left truncation is allowed. To represent years later than 9999, additional digits can be added to the
 * left of the year value. To represent years before 0001, a preceding minus sign ("-") is allowed.
 *
 * An optional time zone expression may be added at the end of the value. The letter Z is used to indicate Coordinated
 * Universal Time (UTC). All other time zones are represented by their difference from Coordinated Universal Time in
 * the format +hh:mm, or -hh:mm. These values may range from -14:00 to 14:00. For example, US Eastern Standard Time,
 * which is five hours behind UTC, is represented as -05:00. If no time zone value is present, it is considered
 * unknown; it is not assumed to be UTC.
 * @package AlgoWeb\xsdTypes
 */
class xsGYear extends xsAnySimpleType
{
    use MinMaxTrait;

    /**
     * Construct.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet('collapse');
    }

    public function fixValue()
    {
        parent::fixValue();
        $v = new \DateTime($this->value);
        $this->value = $v->format('Y');
    }

    protected function isOK()
    {
        $this->CheckMinMax(new \Date($this->value));
    }
}
