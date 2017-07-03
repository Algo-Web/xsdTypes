<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:language represents a natural language identifier, generally used to indicate the language of a
 * document or a part of a document. Before creating a new attribute of type xsd:language, consider using the xml:lang
 * attribute that is intended to indicate the natural language of the element and its content.
 *
 * Values of the xsd:language type conform to RFC 3066, Tags for the Identification of Languages.
 * The three most common formats are:
 *
 * For ISO-recognized languages, the format is a two- or three-letter, (usually lowercase) language code that
 * conforms to ISO 639, optionally followed by a hyphen and a two-letter, (usually uppercase) country code that
 * conforms to ISO 3166. For example, en or en-US.
 *
 * For languages registered by the Internet Assigned Numbers Authority (IANA), the format is i-langname, where
 * langname is the registered name. For example, i-navajo.
 *
 * For unofficial languages, the format is x-langname, where langname is a name of up to eight characters
 * agreed upon by the two parties sharing the document. For example, x-Newspeak.
 *
 * Any of these three formats may have additional parts, each preceded by a hyphen, which identify additional
 * countries or dialects. Schema processors will not verify that values of the xsd:language type conform to the above
 * rules. They will simply validate based on the pattern specified for this type.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsLanguage extends xsToken
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setPatternFacet("[a-zA-Z]{1,8}(-[a-zA-Z0-9]{1,8})*");
        $this->setWhiteSpaceFacet("collapse");
        if ('AlgoWeb\xsdTypes\xsLanguage' == get_class($this)) {
            $this->fixValue();
        }
    }

    protected function fixValue()
    {
        parent::fixValue();

        $this->__value = trim($this->__value);
    }

    protected function isOK()
    {
        parent::isOK($this->__value);
        if (null == $this->__value) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " can not be null "
            );
        }
        if (!is_string($this->__value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be a string "
            );
        }
        if (empty(trim($this->__value))) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be a not be a blank string "
            );
        }
        if (8 < strlen($this->__value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be a not be longer then 8 characters "
            );
        }
    }
}
