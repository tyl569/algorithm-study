<?php

/**
 * Shopee物流会有很多个中转站。在选址的过程中，会选择离用户最近的地方建一个物流中转站。
 *
 * 假设给你一个二维平面网格，每个格子是房子则为1，或者是空地则为0。
 * 找到一个空地修建一个物流中转站，使得这个物流中转站到所有的房子的距离之和最小。
 * 能修建，则返回最小的距离和。如果无法修建，则返回 -1。
 *
 *
 * 若范围限制在100*100以内的网格，如何计算出最小的距离和？
 *
 * 当平面网格非常大的情况下，如何避免不必要的计算？
 *
 * [
 *  [0,1,1,0],
 *  [1,1,0,1],
 *  [0,0,1,0],
 *  [0,0,0,0]
 * ]
 *
 *  最短距离8
 *
 */

// 暴力解决
// O(N^4)
function solution($matrix)
{
    $path = 0;
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[0]); $j++) {
            if ($matrix[$i][$j] == 0) { //
                for ($m = 0; $m < count($matrix); $m++) {
                    for ($n = 0; $n < count($matrix[0]); $n++) {
                        if ($matrix[$m][$n] == 1) {
                            $path += abs($m - $i) + abs($n - $j);
                        }
                    }
                }
                if (!isset($mini)) {
                    $mini = $path;
                } else {
                    $mini = min($mini, $path);
                }
                unset($path);

            }
        }
    }
    return $mini;
}

// 空间换时间
// O(N^2)
function solution2($matrix)
{
    $matrix_0 = []; // 保存0的矩阵位置的数组
    $matrix_1 = [];// 保存1的矩阵位置数组

    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[0]); $j++) {
            if ($matrix[$i][$j] == 0) {
                $matrix_0[] = [$i, $j];
            } else {
                $matrix_1[] = [$i, $j];
            }
        }
    }

    for ($i = 0; $i < count($matrix_0); $i++) {
        $path = 0;
        for ($j = 0; $j < count($matrix_1); $j++) {
            $path += abs($matrix_0[$i][0] - $matrix_1[$j][0]) + abs($matrix_0[$i][1] - $matrix_1[$j][1]);
        }
        if (!isset($min)) {
            $min = $path;
        }
        $min = min($min, $path);
        unset($path);
    }
    return $min;

}


mock();

function mock()
{
    echo "======= test case start =======\n";
    $matrix = [
        [0, 1, 1, 0],
        [1, 1, 0, 1],
        [0, 0, 1, 0],
        [0, 0, 0, 0]
    ];
    echo solution($matrix) . "\n";
    echo solution2($matrix) . "\n";

    $matrix = [
        [0, 1, 1, 0],
        [1, 1, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0]
    ];
    echo solution($matrix) . "\n";
    echo solution2($matrix) . "\n";
    echo "======= test case end =======\n";
}