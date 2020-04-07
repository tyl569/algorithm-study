<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num)
    {
        if ($num == 1) {
            return true;
        }
        if ($num < 2) {
            return false;
        }
        $left = 2;
        $right = $num / 2;
        while ($left <= $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($mid * $mid == $num) {
                return true;
            }
            if ($mid * $mid > $num) {
                $right = $mid - 1;
            }
            if ($mid * $mid < $num) {
                $left = $mid + 1;
            }
        }
        return false;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $ret = (new Solution())->isPerfectSquare(4);
    var_dump($ret);
    $ret = (new Solution())->isPerfectSquare(6);
    var_dump($ret);
    $ret = (new Solution())->isPerfectSquare(8);
    var_dump($ret);
    $ret = (new Solution())->isPerfectSquare(12);
    var_dump($ret);
    $ret = (new Solution())->isPerfectSquare(16);
    var_dump($ret);

    echo "======= test case end =======\n";
}