<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:ID is used for an attribute that uniquely identifies an element in an XML document.
 * An xsd:ID value must be an NCName.  This means that it must start with a letter or underscore,
 * and can only contain letters, digits, underscores, hyphens, and periods.
 *
 * xsd:ID carries several additional constraints:
 *
 * Their values must be unique within an XML instance, regardless of the attribute's name or its element name.
 * A complex type cannot include more than one attribute of type xsd:ID, or any type derived from xsd:ID.
 * xsd:ID attributes cannot have default or fixed values specified.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsID extends xsNCName
{
    /**
     * Construct
     *
     * @param string $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }
}
