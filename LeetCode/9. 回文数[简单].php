<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0 || ($x % 10 == 0 && $x != 0)) {
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

    function isPalindrome_2($x)
    {
        if ($x < 0 || ($x % 10 == 0 && $x != 0)) {
            return false;
        }
        $revertedNumber = 0;
        while ($x > $revertedNumber) {
            $revertedNumber = $revertedNumber * 10 + $x % 10;
            $x = intval($x / 10);
        }
        return $x == $revertedNumber || $x == intval($revertedNumber / 10);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->isPalindrome(121));
    var_dump((new Solution())->isPalindrome(-121));
    var_dump((new Solution())->isPalindrome(10));
    var_dump((new Solution())->isPalindrome_2(1221));
    var_dump((new Solution())->isPalindrome_2(-121));
    var_dump((new Solution())->isPalindrome_2(10));
    echo "======= test case end =======\n";
}