<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:Name represents an XML name, which can be used as an element-type name or attribute name, among other
 * things.  Specifically, this means that values must start with a letter, underscore(_), or colon (:), and may contain
 * only letters, digits, underscores (_), colons (:), hyphens (-), and periods (.).  Colons should only be used to
 * separate namespace prefixes from local names.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsName extends xsToken
{
    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setPatternFacet("\i\c*");
    }
}
