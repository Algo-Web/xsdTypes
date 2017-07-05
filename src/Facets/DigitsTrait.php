<?php
namespace AlgoWeb\xsdTypes\Facets;

trait DigitsTrait
{
    /**
     * @Exclude
     * @var int Specifies the maximum number of decimal places allowed.  Must be equal to or greater than zero
     */
    private $fractionDigits = null;
    /**
     * @Exclude
     * @var int Specifies the exact number of digits allowed.  Must be greater than zero
     */
    private $totalDigits = null;

    /**
     * @param int $fd Specifies the exact number of digits allowed.  Must be greater than zero
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
                'The provided fractionDigits for  ' . __CLASS__ . ' is non numeric.'
            );
        }
        if (abs($fd) != $fd) {
            throw new \InvalidArgumentException(
                'The provided fractionDigits for  ' . __CLASS__ . ' must be non negative.'
            );
        }
        if (round($fd) != $fd) {
            throw new \InvalidArgumentException(
                'The provided fractionDigits for  ' . __CLASS__ . ' must be a whole number.'
            );
        }
    }

    public function checkTotalDigits($v)
    {
        if (null == $this->totalDigits) {
            return;
        }
        $stringVal = explode('.', (string)$v);
        if ($this->totalDigits < strlen($stringVal[0])) {
            throw new \InvalidArgumentException(
                'The number of fractionDigits for  ' . __CLASS__ . ' is greater than allowed.'
            );
        }
    }

    /**
     * @param int $fd Specifies the maximum number of decimal places allowed.  Must be equal to or greater than zero
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
        $stringVal = explode('.', (string)$v);
        if (2 == count($stringVal)) {
            if ($this->fractionDigits < strlen($stringVal[1])) {
                throw new \InvalidArgumentException(
                    'The number of fractionDigits for  ' . __CLASS__ . ' is greater than allowed.'
                );
            }
        }
    }

    public function fixFractionDigits($v)
    {
        if (null != $this->fractionDigits) {
            return round($v, $this->fractionDigits);
        }
        return;
    }
}
