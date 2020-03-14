<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n == 1 || $n == 2) {
            return $n;
        }
        $num1 = 1;
        $num2 = 2;
        for ($i = 3; $i <= $n; $i++) {
            $tmp = $num2;
            $num2 = $num2 + $num1;
            $num1 = $tmp;
        }
        return $num2;
    }
}