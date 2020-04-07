<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        if ($x < 2) {
            return $x;
        }
        $left = 2;
        $right = intval($x / 2);
        while ($left <= $right) {
            $mid = intval($left + ($right - $left) / 2);
            $num = $mid * $mid;
            if ($num > $x) {
                $right = $mid - 1;
            } elseif ($num < $x) {
                $left = $mid + 1;
            } else {
                return $mid;
            }
        }
        return $right;
    }

    // 牛顿迭代法
    function mySqrt_2($x)
    {
        if ($x < 2) {
            return $x;
        }
        $x0 = $x;
        $x1 = ($x0 + $x / $x0) / 2;
        while (abs($x0 - $x1) >= 1) {
            $x0 = $x1;
            $x1 = ($x0 + $x / $x0) / 2;
        }
        return intval($x1);
    }
}

mock();

function mock()
{
    echo "======= test case start ======\n";
    echo (new Solution())->mySqrt(4) . "\n";
    echo (new Solution())->mySqrt(8) . "\n";
    echo (new Solution())->mySqrt_2(4) . "\n";
    echo (new Solution())->mySqrt_2(8) . "\n";
    echo "======= test case end =======\n";
}