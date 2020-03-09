<?php

class Solution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    // 暴力解决
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

    // 分治方法
    public function largestRectangleArea2($heights)
    {
        return $this->calMaxArea($heights, 0, count($heights) - 1);
    }

    function calMaxArea($heights, $start, $end)
    {
        if ($start > $end) {
            return 0;
        }
        $miniIndex = $start;
        for ($i = $start; $i <= $end; $i++) {
            if ($heights[$i] < $heights[$miniIndex]) {
                $miniIndex = $i;
            }
        }
        $miniIndexArea = $heights[$miniIndex] * ($end - $start + 1); // 最小位置的面积
        $leftMax = $this->calMaxArea($heights, $start, $miniIndex - 1);// 左边最大的面积
        $rightMax = $this->calMaxArea($heights, $miniIndex + 1, $end);// 右边最大的面积
        return max($miniIndexArea, $leftMax, $rightMax);
    }
}

echo (new Solution())->largestRectangleArea([2, 1, 5, 6, 2, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 2]);
echo "\n";


echo (new Solution())->largestRectangleArea2([2, 1, 5, 6, 2, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea2([2, 2]);
echo "\n";