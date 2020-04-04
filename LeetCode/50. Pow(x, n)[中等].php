<?php

class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }
        return $this->fastPow($x, $n);
    }

    function fastPow($x, $n)
    {
        if ($n == 0) {
            return 1;
        }
        $half = $this->fastPow($x, intval($n / 2));
        if ($n % 2 == 0) {
            $res = $half * $half;
        } else {
            $res = $half * $half * $x;
        }
        return $res;
    }

    function myPow_2($x, $n)
    {
        if ($n < 0) {
            $x = 1 / $x;
            $n = -$n;
        }
        $cur = $x;
        $ans = 1;
        for ($i = $n; intval($i); $i = $i / 2) {
            if ($i % 2 == 1) {
                $ans = $ans * $cur;
            }
            $cur = $cur * $cur;
        }
        return $ans;

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->myPow(2, 10) . "\n";
    echo (new Solution())->myPow_2(2, 10) . "\n";
    echo "======= test case end =======\n";
}