<?php

namespace Samsui\Generator\Provider;

class Math extends BaseProvider
{
    public function between($lower = null, $upper = null, $precision = 0)
    {
        $lower = $lower ?: 0;
        $upper = $upper ?: PHP_INT_MAX;
        if ($lower == $upper) {
            return $lower;
        } elseif ($lower > $upper) {
            $temp = $lower;
            $lower = $upper;
            $upper = $temp;
        }
        $diff = $upper - $lower;
        $random = round($lower + (mt_rand(0, mt_getrandmax()) / mt_getrandmax()), $precision);
        if ($precision == 0) {
            $random = (int)$random;
        }
        return $random;
    }

    public function randomNumber($digits, $upper = null)
    {
        return $this->between(
            pow(10, $digits - 1),
            $upper ?: pow(10, $digits) - 1
        );
    }

    public function randomDigit()
    {
        return $this->between(0, 9);
    }

    public function randomDigitNonZero()
    {
        return $this->randomNumber(1);
    }

    public function randomArrayKey(array $arr)
    {
        if (!$arr) {
            return null;
        }

        return array_rand($arr);
    }

    public function randomArrayValue(array $arr)
    {
        $key = $this->randomArrayKey($arr);
        return $key === null ? null : $arr[$key];
    }

    public function randomWeightedArray(array $arr)
    {
        $total = array_sum($arr);
        $selection = $this->between(0, $total);
        $index = 0;
        foreach ($arr as $item => $weight) {
            $index += $weight;
            if ($index >= $selection) {
                return $item;
            }
        }
        return null;
    }
}
