<?php
/**
 * 给定一个数组arr长度为N，你可以把任意长度大于0且小于N的前缀作为左部分，
 * 剩下的 作为右部分。但是每种划分下都有左部分的最大值和右部分的最大值，
 *
 *
 * 请返回最大的， 左部分最大值减去右部分最大值的绝对值。
 */

function solution($arr)
{
    $max = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $max = max($arr[$i], $max);
    }
    return $max - min($arr[0], $max[count($arr) - 1]);
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    echo solution($arr) . "\n";
    $arr = [3, 1, 2, 3, 4, 5, 10, 7, 8, 9];
    echo solution($arr) . "\n";
    echo "======= test case start =======\n";
}