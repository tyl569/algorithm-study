<?php

/**
 *给定一个N*N的矩阵matrix，只有0和1两种值，返回边框全是1的最大正方形的
 *边长长度。
 * 例如:
 * 01111
 * 01001
 * 01001
 * 01111
 * 01011 其中边框全是1的最大正方形的大小为4*4，所以返回4。
 *
 */
/**
 * 使用2个辅助矩阵
 * 1、统计当前位置及当前位置以下1的个数，如果当前位置为0，则辅助矩阵对应位置的数据为0
 * 2、统计当前位置及当前位置以下1的个数，如果当前位置为0，则辅助矩阵对应位置的数据为0
 *
 * 循环遍历两个辅助矩阵，计算出最大的边长
 *
 */
/*
 * [
 *      [0,1,1,0,1],
 *      [1,0,1,1,1],
 *      [0,1,1,0,1],
 *      [0,0,1,1,1]
 * ]
 */

function maximalSquare($matrix)
{
    $size = getSize($matrix);
    return $size * $size;
}

function getSize($matrix)
{
    $down = [];
    $right = [];
    for ($i = count($matrix) - 1; $i >= 0; $i--) {
        for ($j = 0; $j < count($matrix[0]); $j++) {
            if ($i == count($matrix) - 1) {
                $down[$i][$j] = $matrix[$i][$j];
            } else {
                if ($matrix[$i][$j] == 0) {
                    $down[$i][$j] = 0;
                } else {
                    $down[$i][$j] = $down[$i + 1][$j] + 1;
                }
            }
        }
    }
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = count($matrix[0]) - 1; $j >= 0; $j--) {
            if ($j == count($matrix[0]) - 1) {
                $right[$i][$j] = $matrix[$i][$j];
            } else {
                if ($matrix[$i][$j] == 0) {
                    $right[$i][$j] = 0;
                } else {
                    $right[$i][$j] = $right[$i][$j + 1] + 1;
                }
            }
        }
    }

    for ($size = min(count($down), count($down[0])); $size >= 0; $size--) {
        for ($i = 0; $i < count($down); $i++) {
            for ($j = 0; $j < count($down[0]); $j++) {
                if ($size <= $down[$i][$j] && $size <= $down[$i][$j + $size - 1]
                    && $size <= $right[$i][$j] && $size <= $right[$i + $size - 1][$j]) {
                    return $size;
                }
            }
        }
    }
}

function mock()
{
    echo "========= test case start =========\n";
    $matrix = [
        [0, 1, 1, 0, 1],
        [1, 0, 1, 1, 1],
        [0, 1, 1, 0, 1],
        [0, 0, 1, 1, 1]
    ];
    $matrix = [
        [0, 1, 1, 0, 1],
        [1, 0, 1, 1, 1],
        [0, 1, 1, 1, 1],
        [0, 0, 1, 1, 1]
    ];
//$matrix = [
//    [0, 1, 1, 0, 1],
//    [1, 0, 1, 1, 1],
//    [0, 1, 1, 1, 1],
//    [0, 0, 1, 0, 1]
//];
    $matrix = [
        ["1", "0", "1", "1", "0", "1"],
        ["1", "1", "1", "1", "1", "1"],
        ["0", "1", "1", "0", "1", "1"],
        ["1", "1", "1", "0", "1", "0"],
        ["0", "1", "1", "1", "1", "1"],
        ["1", "1", "0", "1", "1", "1"]];
    echo maximalSquare($matrix);
    echo "========= test case end =========\n";
}
