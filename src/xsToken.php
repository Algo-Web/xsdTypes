<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:token represents a character string that may contain any Unicode character allowed by XML.
 * Certain characters, namely the "less than" symbol (<) and the ampersand (&), must be escaped
 * (using the entities &lt; and &amp;, respectively) when used in strings in XML instances.
 *
 * The name xsd:token may be slightly confusing because it implies that there may be only one token with no whitespace.
 * In fact, there can be whitespace in a token value.  The xsd:token type has a whiteSpace facet of collapse, which
 * means that the processor replaces each carriage return, line feed, and tab by a single space. After this replacement,
 * each group of consecutive spaces is collapsed into one space character, and all leading and trailing spaces are
 * removed.  This processing is equivalent to the processing of non-CDATA attribute values in XML 1.0.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsToken extends xsNormalizedString
{
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
}
