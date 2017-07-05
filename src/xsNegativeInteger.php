<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:negativeInteger represents an arbitrarily large-in-magnitude negative integer.  An xsd:negativeInteger
 * is a sequence of digits, preceded by a - sign. Leading zeros are permitted, but decimal points are not.
 * @package AlgoWeb\xsdTypes
 */
class xsNegativeInteger extends xsNonPositiveInteger
{
    /**
     * Construct
     *
     * @param int $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMaxInclusive(-1);
    }
}
