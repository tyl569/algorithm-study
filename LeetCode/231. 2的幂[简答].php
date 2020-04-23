<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n)
    {
        if ($n == 0) {
            return false;
        }
        return ($n & ($n - 1)) == 0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->isPowerOfTwo(4)) . "\n";
    var_dump((new Solution())->isPowerOfTwo(6)) . "\n";
    var_dump((new Solution())->isPowerOfTwo(8)) . "\n";
    echo "======= test case end =======\n";
}