<?php
namespace AlgoWeb\xsdTypes\Facets;

trait EnumerationTrait
{
    /**
     * @Exclude
     * @var array Defines a list of acceptable values
     */
    private $enumeration = null;

    /**
     * @param array $enumerationValues Defines a list of acceptable values
     */
    protected function setEnumeration(array $enumerationValues)
    {
        $this->enumeration = $enumerationValues;
    }

    /**
     * @param string $enumerationValue Adds a value to the enumeration set.
     */
    protected function addEnumeration($enumerationValue)
    {
        if (!is_array($this->enumeration)) {
            $this->enumeration = [];
        }
        $this->enumeration[] = $enumerationValue;
    }

    private function checkEnumeration($v)
    {
        if (is_array($this->enumeration) && 0 != count($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is not " .
                implode(" || ", $this->enumeration)
            );
        }
    }
}
