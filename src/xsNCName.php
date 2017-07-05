<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:NCName represents an XML non-colonized name, which is simply a name that does not contain colons.
 * An xsd:NCName value must start with either a letter or underscore (_) and may contain only letters, digits,
 * underscores (_), hyphens (-), and periods (.).  This is equivalent to the Name type, except that colons are not
 * permitted.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNCName extends xsName
{
    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setPatternFacet("[\i-[:]][\c-[:]]*");
    }
}
