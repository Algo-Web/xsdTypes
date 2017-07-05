<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:nonPositiveInteger represents an arbitrarily large-in-magnitude non-positive integer. An
 * xsd:nonPositiveInteger is a sequence of digits, optionally preceded by a - sign. Leading zeros are permitted, but
 * decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsNonPositiveInteger extends xsInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(0);
    }
}
