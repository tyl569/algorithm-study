<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix)
    {
        if (count($matrix) == 0) {
            return 0;
        }
        $maxArea = 0;
        $dp = [];
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[0]); $j++) {
                if ($matrix[$i][$j] == 1) { // 如果当前位置是 1
                    // 统计从从左到右连续1的个数
                    $dp[$i][$j] = ($j == 0) ? 1 : $dp[$i][$j - 1] + 1;
                    $width = $dp[$i][$j];
                    for ($k = $i; $k >= 0; $k--) { // 从当前位置向上统计下能组成矩形的边长
                        $width = min($width, $dp[$k][$j]); // 取最小边长
                        $maxArea = max($maxArea, $width * ($i - $k + 1)); // 边长确定之后，取高
                    }
                }
            }
        }
        return $maxArea;
    }

    function maximalRectangle_2($matrix)
    {
        if (count($matrix) == 0) {
            return 0;
        }
        $m = count($matrix);
        $n = count($matrix[0]);
        $height = [];
        $left = [];
        $right = array_fill(0, $n, $n);
        $maxArea = 0;
        for ($i = 0; $i < $m; $i++) {
            $curLeft = 0;
            $curRight = $n;
            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == 1) { // 更新高度
                    $height[$j]++;
                } else {
                    $height[$j] = 0;
                }
            }

            for ($j = 0; $j < $n; $j++) {
                if ($matrix[$i][$j] == 1) { // 更新高度
                    $left[$j] = max($left[$j], $curLeft);
                } else {
                    $left[$j] = 0;
                    $curLeft = $j + 1;
                }
            }

            for ($j = $n - 1; $j >= 0; $j--) {
                if ($matrix[$i][$j] == 1) {
                    $right[$j] = min($right[$j], $curRight);
                } else {
                    $right[$j] = $n;
                    $curRight = $j;
                }
            }

            for ($j = 0; $j < $n; $j++) {
                $maxArea = max($maxArea, ($right[$j] - $left[$j]) * $height[$j]);
            }
        }
        return $maxArea;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $matrix = [
        ["1", "0", "1", "0", "0"],
        ["1", "0", "1", "1", "1"],
        ["1", "1", "1", "1", "1"],
        ["1", "0", "0", "1", "0"]
    ];
    echo (new Solution())->maximalRectangle($matrix) . "\n";

    echo (new Solution())->maximalRectangle_2($matrix) . "\n";
    echo "======= test case end =======\n";
}