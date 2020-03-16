<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0) {
            return false;
        }
        $x = strval($x);
        $start = 0;
        $end = strlen($x) - 1;
        while ($start < $end) {
            if ($x{$start} != $x{$end}) {
                return false;
            }
            $start++;
            $end--;
        }
        return true;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->isPalindrome(121));
    var_dump((new Solution())->isPalindrome(-121));
    var_dump((new Solution())->isPalindrome(10));
    echo "======= test case end =======\n";
}