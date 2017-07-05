<?php

namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * Class xsQName
 * @package AlgoWeb\xsdTypesThe type xsd:QName represents an XML namespace-qualified name. A xsd:QName value consists
 * of a prefix and a local part, separated by a colon, both of which are NCName values. The prefix and colon are
 * optional, but if they are not present, it is assumed that either the name is namespace-qualified by other means
 * (e.g., by a default namespace declaration), or the name is not in a namespace.
 */
class xsQName extends xsAnySimpleType
{
    use LengthTrait;

    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("collapse");
    }

    protected function isOK()
    {
        $this->checkMaxLength($this->value);
        $this->checkMinLength($this->value);
    }
}
