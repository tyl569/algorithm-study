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
            $j = 0;
            while ($j < $n) { // 向上延伸
                if ($matrix[$i][$j] == 1) {
                    $height[$j]++;
                } else {
                    $height[$j] = 0;
                }
                $j++;
            }
            $k = 0;
            while ($k < $n) { // 向左延伸
                if ($matrix[$i][$k] == 1) {
                    $left[$k] = max($left[$k], $curLeft);
                } else {
                    $left[$k] = 0;
                    $curLeft = $k + 1;
                }
                $k++;
            }
            $l = $n - 1;
            while ($l >= 0) { // 向右延伸
                if ($matrix[$i][$l] == 1) {
                    $right[$l] = min($right[$l], $curRight);

                } else {
                    $right[$l] = $n;
                    $curRight = $l;
                }
                $l--;
            }
            $z = 0;
            while ($z < $n) {
                $maxArea = max($maxArea, ($right[$z] - $left[$z]) * $height[$z]);
                $z++;
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