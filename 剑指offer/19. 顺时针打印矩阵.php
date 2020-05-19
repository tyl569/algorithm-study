<?php

/**
 * @param $matrix
 * @return array
 *
 * 题目描述
 * 输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字，
 * 例如，如果输入如下4 X 4矩阵： 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16
 * 则依次打印出数字1,2,3,4,8,12,16,15,14,13,9,5,6,7,11,10.
 *
 */
function printMatrix($matrix)
{
    $arr = [];
    $r1 = 0;
    $c1 = 0;
    $r2 = count($matrix) - 1;
    $c2 = count($matrix[0]) - 1;
    while ($r1 <= $r2 && $c1 <= $c2) {
        for ($c = $c1; $c <= $c2; $c++) { // 从第一行向右走
            $arr[] = $matrix[$r1][$c];
        }
        for ($r = $r1 + 1; $r <= $r2; $r++) { // 走到最后一列，向下走
            $arr[] = $matrix[$r][$c2];
        }
        if ($r1 < $r2 && $c1 < $c2) {
            for ($c = $c2 - 1; $c > $c1; $c--) { // 走到最后一行，向左走
                $arr[] = $matrix[$r2][$c];
            }
            for ($r = $r2; $r > $r1; $r--) { // 走到最左一列，向上走
                $arr[] = $matrix[$r][$c1];
            }
        }

        $r1++;
        $c1++;
        $r2--;
        $c2--;

    }

    return $arr;
}

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
$ret = printMatrix($matrix);
var_dump($ret);