<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $m
     * @return Integer
     */
    function splitArray($nums, $m)
    {
        $n = count($nums);
        $f = [];
        $sub = [];
        for ($i = 0; $i <= $n; $i++) {
            for ($j = 0; $j <= $m; $j++) {
                $f[$i][$j] = PHP_INT_MAX;
            }
        }
        for ($i = 0; $i < $n; $i++) {
            $sub[$i + 1] = $sub[$i] + $nums[$i];
        }
        $f[0][0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            for ($j = 1; $j <= $m; $j++) {
                for ($k = 0; $k < $i; $k++) {
                    $f[$i][$j] = min($f[$i][$j], max($f[$k][$j - 1], $sub[$i] - $sub[$k]));
                }
            }
        }
        return $f[$n][$m];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->splitArray([7, 2, 5, 10, 8], 2) . "\n";
    echo "======= test case end =======\n";
}