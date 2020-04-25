<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n)
    {
        $res = 0;
        for ($i = 31; $i >= 0; $i--) {
            $bit = ($n & 1) << $i; // 将数字N的末尾，移到第$i位
            $res = $res + $bit; // 将移动后的数字累加
            $n = $n >> 1; // 移动之后，N向右移动一位
        }
        return $res;

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