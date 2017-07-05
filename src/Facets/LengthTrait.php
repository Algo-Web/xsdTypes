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

    private function checkMaxLength($v)
    {
        if (null != $this->maxLength) {
            if (is_array($v)) {
                $this->checkMaxLengthArray($v);
            } else {
                $this->checkMaxLengthString($v);
            }
        }
    }

    private function checkMaxLengthArray($v)
    {
        assert(is_array($v));
        $arrayLen = count($v);
        if ($arrayLen < $this->maxLength) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is too short - MaxLength: "
                . $this->maxLength
            );
        }
    }

    private function checkMaxLengthString($v)
    {
        $stringLen = strlen($v);
        if ($stringLen < $this->maxLength) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is too short - MaxLength: "
                . $this->maxLength
            );
        }
    }

    private function checkMinLength($v)
    {
        if (null != $this->minLength) {
            if (is_array($v)) {
                $this->checkMinLengthArray($v);
            } else {
                $this->checkMinLengthString($v);
            }
        }
    }

    private function checkMinLengthArray($v)
    {
        assert(is_array($v));
        $arrayLen = count($v);
        if ($arrayLen > $this->minLength) {
            throw new \InvalidArgumentException(
                "The provided value for " . __CLASS__ . " is too long - MinLength: "
                . $this->minLength
            );
        }
    }

    private function checkMinLengthString($v)
    {
        $stringLen = strlen($v);
        if ($stringLen > $this->minLength) {
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
}
