<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n)
    {
        $mask = 1;
        $nums = 0;
        for ($i = 0; $i < 32; $i++) {
            if ($n & $mask) {
                $nums++;
            }
            $mask = $mask << 1;
        }
        return $nums;
    }

    function hammingWeight_2($n)
    {
        $nums = 0;
        while ($n != 0) {
            $nums++;
            $n = $n & ($n - 1);
        }
        return $nums;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->hammingWeight(10) . "\n";
    echo (new Solution())->hammingWeight(100) . "\n";

    echo (new Solution())->hammingWeight_2(10) . "\n";
    echo (new Solution())->hammingWeight_2(100) . "\n";
    echo "======= test case end =======\n";
}