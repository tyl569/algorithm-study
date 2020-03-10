<?php

class Solution
{

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n)
    {
        $dp = [];
        for ($j = 0; $j < $n; $j++) {
            $dp[$j] = 1;
        }
        for ($i = 1; $i < $m; $i++) {
            for ($j = 1; $j < $n; $j++) {
                $tmp = $dp[$j];
                $dp[$j] = $dp[$j - 1] + $tmp;
            }
        }
        return $dp[$n - 1];
    }
}