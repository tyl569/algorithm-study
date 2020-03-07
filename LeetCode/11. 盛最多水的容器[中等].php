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

    function maxArea2($height)
    {
        $max = 0;
        $start = 0;
        $end = count($height) - 1;
        while ($start < $end) {

            $l = $end - $start;
            $h = min($height[$end], $height[$start]);
            $max = max($max, $l * $h);

            if ($height[$start] < $height[$end]) { // 谁更小，谁就挪动
                $start++;
            } else {
                $end--;
            }
        }
        return $max;
    }
}

echo (new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]);
echo "\n";
echo (new Solution())->maxArea2([1, 8, 6, 2, 5, 4, 8, 3, 7]);