<?php

class Solution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights)
    {
        $max = 0;
        for ($i = 0; $i < count($heights); $i++) {
            $h = $heights[$i]; // 默认第i个元素是高
            if (!isset($heights[$i + 1])) {
                $max = max($max, 1 * $h);
            }
            for ($j = $i + 1; $j < count($heights); $j++) {
                if ($heights[$j] == 0) {
                    $max = max($max, 1 * $h);
                }
                $h = min($h, $heights[$i], $heights[$j]);
                $l = $j - $i + 1;
                $max = max($max, $h * $l);
            }
        }
        return $max;
    }
}

echo (new Solution())->largestRectangleArea([2, 1, 5, 6, 2, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 2]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 1, 1, 1, 1, 1]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 1]);
echo "\n";
echo (new Solution())->largestRectangleArea([0, 2]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 0, 0]);
echo "\n";
echo (new Solution())->largestRectangleArea([6, 7, 5, 2, 4, 5, 9, 3]);
