<?php
namespace AlgoWeb\xsdTypes;

use AlgoWeb\xsdTypes\Facets\LengthTrait;

/**
 * The type xsd:string represents a character string that may contain any Unicode character allowed by XML. Certain
 * characters, namely the "less than" symbol (<) and the ampersand (&), must be escaped (using the entities
 * &lt; and &amp;, respectively) when used in strings in XML instances.
 *
 * The xsd:string type has a whiteSpace facet of preserve, which means that all whitespace characters
 * (spaces, tabs, carriage returns, and line feeds) are preserved by the processor.
 * This is in contrast to two types derived from it: normalizedString, and token.
 *
 * Valid values              Comment
 * "This is a string!"
 * "Édition française."
 * "12.5
 *                          :an empty string is valid
 * "PB&amp;J"               :when parsed, it will become "PB&J"
 * "This
 * is on two lines."
 * Invalid values           Comment
 * "AT&T"                        ampersand must be escaped
 * "3 < 4"                    the "less than" symbol must be escaped
 * But most of that should be handled by JSM
 *
 * @package AlgoWeb\xsdTypes
 */
class xsString extends xsAnySimpleType
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
        $this->setWhiteSpaceFacet("preserve");
    }

    protected function isOK()
    {
        $this->checkMaxLength($this->value);
        $this->checkMinLength($this->value);
        if (is_array($this->value) || is_object($this->value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " is should not be an array or an object: "
            );
        }
    }
}
