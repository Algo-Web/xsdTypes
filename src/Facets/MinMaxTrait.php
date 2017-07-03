<?php
namespace AlgoWeb\xsdTypes\Facets;

//TODO: we need to extend this to handle dates.
trait MinMaxTrait
{
    /**
     * @Exclude
     * @var integer Specifies the lower bounds for numeric values (the value must be greater than or equal to this value)
     */
    private $minInclusive = null;
    /**
     * @Exclude
     * @var integer Specifies the upper bounds for numeric values (the value must be less than or equal to this value)
     */
    private $maxInclusive = null;

    /**
     * @param int $v Specifies the upper bounds for numeric values (the value must be less than this value)
     */
    public function setMaxExclusive($v)
    {
        if (is_int($v)) {
            $this->maxInclusive = $v - 1;
        } else {
            $this->minInclusive = $v - 0.000001;
        }
    }

    /**
     * @param int $v Specifies the upper bounds for numeric values (the value must be less than or equal to this value)
     */
    public function setMaxInclusive($v)
    {
        $this->maxInclusive = $v;
    }

    /**
     * @param int $v Specifies the lower bounds for numeric values (the value must be greater than this value)
     */
    public function setMinExclusive($v)
    {
        if (is_int($v)) {
            $this->minInclusive = $v + 1;
        } else {
            $this->minInclusive = $v + 0.000001;
        }
    }

    /**
     * @param int $v Specifies the lower bounds for numeric values (the value must be greater than or equal to this value)
     */
    public function setMinInclusive($v)
    {
        $this->minInclusive = $v;
    }

    public function CheckMinMax($v)
    {
        if (null != $this->minInclusive) {
            if ($v < $this->minInclusive) {
                throw new \InvalidArgumentException("value below allowed min value " . __CLASS__);
            }
        }
        if (null != $this->maxInclusive) {
            if ($v > $this->maxInclusive) {
                throw new \InvalidArgumentException(" value above allowed max value " . __CLASS__);
            }
        }
    }
}
