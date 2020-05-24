<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $rev = 0;
        while ($x != 0) {
            $pop = $x % 10;
            $x = intval($x / 10);
            $rev = $rev * 10 + $pop;

        }
        if ($rev > pow(2, 31) || $rev < pow(-2, 31)) {
            return 0;
        }

        return $rev;
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->reverse(123456) . "\n";

    echo "======= test case end =======\n";
}