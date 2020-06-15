<?php

class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n)
    {
        $total = $m + $n - 1;
        $m = $m - 1;
        $n = $n - 1;
        while ($m >= 0 && $n >= 0) {
            if ($A[$m] <= $B[$n]) {
                $A[$total] = $B[$n];
                $n--;
            } else {
                $A[$total] = $A[$m];
                $m--;
            }
            $total--;
        }
        while ($n >= 0) {
            $A[$n] = $B[$n];
            $n--;
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $A = [1, 2, 3, 0, 0, 0];
    $B = [2, 5, 6];
    $m = 3;
    $n = 3;
    (new Solution())->merge($A, $m, $B, $n);
    var_dump($A);
    echo "======= test case end =======\n";
}