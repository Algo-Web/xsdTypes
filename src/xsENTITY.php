<?php
namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:ENTITY represents a reference to an unparsed entity.
 * The xsd:ENTITY type is most often used to include information from another location that is not in XML format, such
 * as graphics.  An xsd:ENTITY value must be an NCName.  An xsd:ENTITY value carries the additional constraint that it
 * must match the name of an unparsed entity in a document type definition (DTD) for the instance.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsENTITY extends xsNCName
{
    /**
     * Construct
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
    }
}
