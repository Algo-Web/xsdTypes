<?php
namespace AlgoWeb\xsdTypes\Facets;

trait DigitsTrait
{
    /**
     * @Exclude
     * @var integer Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
     */
    private $fractionDigits = null;
    /**
     * @Exclude
     * @var integer Specifies the exact number of digits allowed. Must be greater than zero
     */
    private $totalDigits = null;

    /**
     * @param integer $fd Specifies the exact number of digits allowed. Must be greater than zero
     */
    public function setTotalDigits($fd)
    {
        $this->checkDigitLength($fd);
        $this->totalDigits = $fd;
    }

    private function checkDigitLength($fd)
    {
        if (!is_numeric($fd)) {
            throw new \InvalidArgumentException(
                "the provided fractionDigits for  " . __CLASS__ . " is non numeric "
            );
        }
        if (abs($fd) != $fd) {
            throw new \InvalidArgumentException(
                "the provided fractionDigits for  " . __CLASS__ . " must be non negative "
            );
        }
        if (round($fd) != $fd) {
            throw new \InvalidArgumentException(
                "the provided fractionDigits for  " . __CLASS__ . " must be a whole number "
            );
        }
    }

    public function checkTotalDigits($v)
    {
        if (null == $this->totalDigits) {
            return;
        }
        $stringVal = explode(".", (string)$v);
        if ($this->totalDigits < strlen($stringVal[0])) {
            throw new \InvalidArgumentException(
                "the number of fractionDigits for  " . __CLASS__ . " is greater the allowed. "
            );
        }
    }

    /**
     * @param integer $fd Specifies the maximum number of decimal places allowed. Must be equal to or greater than zero
     */
    public function setFractionDigits($fd)
    {
        $this->checkDigitLength($fd);
        $this->fractionDigits = $fd;
    }

    public function checkFractionDigits($v)
    {
        if (null == $this->fractionDigits) {
            return;
        }
        $stringVal = explode(".", (string)$v);
        if (2 == count($stringVal)) {
            if ($this->fractionDigits < strlen($stringVal[1])) {
                throw new \InvalidArgumentException(
                    "the number of fractionDigits for  " . __CLASS__ . " is greater the allowed. "
                );
            }
        }
    }

    public function fixFractionDigits($v)
    {
        if (null != $this->fractionDigits) {
            return round($v, $this->fractionDigits);
        }
        return null;
    }
}
