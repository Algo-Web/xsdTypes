<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:boolean represents logical yes/no values. The valid values for xsd:boolean are true, false, 0, and 1.
 * Values that are capitalized (e.g. TRUE) or abbreviated (e.g. T) are not valid.
 * @package AlgoWeb\xsdTypes
 */
class xsBoolean extends xsAnySimpleType
{
    /**
     * Construct
     *
     * @param bool $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
    }

    protected function isOK()
    {
        if (boolval($this->value) !== $this->value) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " needs to be a boolean: "
            );
        }
    }
}
