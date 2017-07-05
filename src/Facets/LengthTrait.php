<?php
namespace AlgoWeb\xsdTypes\Facets;

trait LengthTrait
{
    /**
     * @Exclude
     * @var integer Specifies the maximum number of characters or list items allowed.  Must be equal to or greater than zero
     */
    private $maxLength = null;
    /**
     * @Exclude
     * @var integer Specifies the minimum number of characters or list items allowed.  Must be equal to or greater than zero
     */
    private $minLength = null;

    /**
     * @param integer $value Specifies the exact number of characters or list items allowed.  Must be equal to or greater than zero
     */
    protected function setLengthFacet($value)
    {
        $this->setMinLengthFacet($value);
        $this->setMaxLengthFacet($value);
    }

    /**
     * @param integer $value Specifies the minimum number of characters or list items allowed.  Must be equal to or greater than zero
     */
    protected function setMinLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->minLength = $value;
    }

    /**
     * @param integer $value
     */
    private function checkValidMinMaxLength($value, $min = 0)
    {
        if (((int)$value) != $value) {
            throw new \InvalidArgumentException("Length values MUST be castable to int " . __CLASS__);
        }
        if ($min >= $value) {
            throw new \InvalidArgumentException("Length values MUST be greater than 0 " . __CLASS__);
        }
    }

    /**
     * @param integer $value Specifies the maximum number of characters or list items allowed.  Must be equal to or greater than zero
     */
    protected function setMaxLengthFacet($value)
    {
        $this->checkValidMinMaxLength($value);
        $this->maxLength = $value;
    }

    private function checkLength($v)
    {
        if (null != $this->minLength) {
            $this->checkMinLength($v);
        }
        if (null != $this->maxLength) {
            $this->checkMaxLength($v);
        }
    }

    private function checkMinLength($v)
    {
        $len = $this->getLengthForValue($v);
        if ($len > $this->minLength) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is too long - MinLength: "
                . $this->minLength
            );
        }
    }

    private function getLengthForValue($v)
    {
        if (is_array($v)) {
            return count($v);
        }
        return strlen($v);
    }

    private function checkMaxLength($v)
    {
        $len = $this->getLengthForValue($v);
        if ($len < $this->maxLength) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is too short - MaxLength: "
                . $this->maxLength
            );
        }
    }
}
