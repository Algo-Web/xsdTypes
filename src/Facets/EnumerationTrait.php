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
     * @param string $enumerationValue adds a value to the enumeration set
     */
    protected function addEnumeration($enumerationValue)
    {
        if (!is_array($this->enumeration)) {
            $this->enumeration = [];
        }
        if ($this->handleAddArray($enumerationValue)) {
        }
        $this->handleAddArray($enumerationValue) ? :$this->enumeration[] = $enumerationValue;
    }
    /**
     * @param string $enumerationValue adds a value to the enumeration set
     */
    private function handleAddArray($enumerationValue)
    {
        if (!is_array($enumerationValue)) {
            return false;
        }
        foreach ($enumerationValue as $eValue) {
            $this->addEnumeration($eValue);
        }
        return;
    }
        

    private function checkEnumeration($v)
    {
        if (is_array($this->enumeration) && 0 != count($this->enumeration) && !in_array($v, $this->enumeration)) {
            throw new \InvalidArgumentException(
                'The provided value for ' . get_class($this) . ' is not ' .
                implode(' || ', $this->enumeration)
            );
        }
    }
}
