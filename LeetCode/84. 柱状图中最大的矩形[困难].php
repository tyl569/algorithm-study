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
            $miniArea = ($end - $start + 1) * $heights[$miniIndex];
            $left = $this->calMaxArea($heights, $start, $miniIndex - 1);
            $right = $this->calMaxArea($heights, $miniIndex + 1, $end);
            $max = max($miniArea, $left, $right);
        }
        return $max;
    }

    // 使用栈 [6,7,5,2,4,5,9,3]
    public function largestRectangleArea3($heights)
    {
        $stack = new SplStack();
        $length = count($heights);
        $stack->push(-1);
        $max = 0;
        for ($i = 0; $i < $length; $i++) {
            while ($stack->top() != -1 && $heights[$stack->top()] >= $heights[$i]) {
                $currentLeft = $stack->pop();
                $area = ($i - $stack->top() - 1) * $heights[$currentLeft];
                $max = max($max, $area);
            }
            $stack->push($i);
        }
        while ($stack->top() != -1) {
            $loc = $stack->pop();
            $area = $heights[$loc] * ($length - $stack->top() - 1);
            $max = max($max, $area);
        }
        return $max;
    }
}

echo (new Solution())->largestRectangleArea([6, 7, 5, 2, 4, 5, 9, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea([2, 2]);
echo "\n";


echo (new Solution())->largestRectangleArea2([6, 7, 5, 2, 4, 5, 9, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea2([2, 2]);
echo "\n";

echo (new Solution())->largestRectangleArea3([6, 7, 5, 2, 4, 5, 9, 3]);
echo "\n";
echo (new Solution())->largestRectangleArea2([2, 2]);
echo "\n";
