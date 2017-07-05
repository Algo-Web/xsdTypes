<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * The type xsd:IDREFS represents a list of IDREF values separated by whitespace. There must be at least one IDREF in
 * the list. Each of the IDREF values must match an ID contained in the same XML document.
 * @package AlgoWeb\xsdTypes
 */
class xsIDREFS extends xsAnySimpleType
{
    use LengthTrait;

    /**
     * Construct
     *
     * @param xsIDREF $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMinLengthFacet(1);
    }

    protected function isOK()
    {
        parent::isOK();
        if (!is_array($this->value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be an array of type xsIDREF "
            );
        }
        foreach ($this->value as $v) {
            $v->isOKInternal();
        }
    }
}
