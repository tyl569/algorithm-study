<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n)
    {
        $ret = 0;
        $power = 31;
        while ($n) {
            $ret += ($n & 1) << $power;
            $n = $n >> 1;
            $power -= 1;
        }
        return $ret;
    }

    function reverseBits_2($n)
    {
        $n = str_pad(decbin($n), 32, 0, STR_PAD_LEFT);
        return bindec(strrev($n));
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->reverseBits(7) . "\n";
    echo (new Solution())->reverseBits_2(7) . "\n";
    echo "======= test case end =======\n";
}