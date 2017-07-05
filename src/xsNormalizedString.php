<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:normalizedString represents a character string that may contain any Unicode character allowed by XML.
 * Certain characters, namely the "less than" symbol (<) and the ampersand (&), must be escaped
 * (using the entities &lt; and &amp;, respectively) when used in strings in XML instances.
 *
 * The xsd:normalizedString type has a whiteSpace facet of replace, which means that the processor replaces each
 * carriage return, line feed, and tab by a single space.  This processing is equivalent to the processing of CDATA
 * attribute values in XML 1.0.  There is no collapsing of multiple consecutive spaces into a single space. Class
 * xsNormalizedString
 *
 * @package AlgoWeb\xsdTypes
 */
class xsNormalizedString extends xsString
{
    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setWhiteSpaceFacet("replace");
    }
}
