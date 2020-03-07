<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $max = 0;
        for ($i = 0; $i < count($height); $i++) {
            for ($j = $i + 1; $j < count($height); $j++) {
                $l = $j - $i;
                $h = min($height[$i], $height[$j]);
                $max = max($max, $l * $h);
            }
        }
        return $max;
    }
}

echo (new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]);