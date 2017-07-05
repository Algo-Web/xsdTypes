<?php
namespace AlgoWeb\xsdTypes;

/**
 * CThe type xsd:IDREF is used for an attribute that references an ID.  All attributes of type xsd:IDREF must reference
 * an xsd:ID in the same XML document.  A common use case for xsd:IDREF is to create a cross-reference to a particular
 * section of a document.  Like ID, an xsd:IDREF value must be an NCName.
 * @package AlgoWeb\xsdTypes
 */
class xsIDREF extends xsNCName
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
