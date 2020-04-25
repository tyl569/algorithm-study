<?php

/**
 * @param $arr
 * @return array
 *
 * 快排时间复杂度 O(n * log2n)
 * 快排空间复杂度 O(n * log2n)
 * 不稳定排序
 *
 *
 */
function QuickSort($arr)
{
    $end = count($arr) - 1;
    if ($end <= 1) {
        return $arr;
    }
    $base = $arr[0];
    $left = [];
    $right = [];
    for ($i = 1; $i <= $end; $i++) {
        if ($arr[$i] <= $base) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
    $left = QuickSort($left);
    $right = QuickSort($right);
    return array_merge($left, [$base], $right);
}

/**
 * @param $arr
 * @return array
 *
 * 归并时间复杂度 O(n * log2n)
 * 快排空间复杂度 O(n * log2n)
 * 稳定排序
 *
 *
 */
function MergeSort($arr)
{
    if (count($arr) == 1) {
        return $arr;
    }
    $mid = count($arr) >> 1; //
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid, count($arr) - $mid);
    $left = MergeSort($left);
    $right = MergeSort($right);
    $arr = doMerge($left, $right);
    return $arr;
}

function doMerge($left, $right)
{
    $leftLen = count($left);
    $rightLen = count($right);

    $i = 0;
    $j = 0;
    $k = 0;
    $res = [];
    while ($i < $leftLen && $j < $rightLen) {
        $res[$k++] = $left[$i] > $right[$j] ? $right[$j++] : $left[$i++];
    }
    while ($i < $leftLen) {
        $res[$k++] = $left[$i++];
    }
    while ($j < $rightLen) {
        $res[$k++] = $right[$j++];
    }
    return $res;
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $arr = [1, 3, 2, 1, 56, 23, 4, 6, 44, 22, 7, 9];
    $ret = QuickSort($arr);
    sort($arr);
    if ($arr == $ret) {
        echo "排序正确\n";
    }

    $arr = [1, 3, 2, 1, 56, 23, 4, 6, 44, 22, 7, 9];
    $ret = MergeSort($arr);
    sort($arr);
    if ($arr == $ret) {
        echo "排序正确\n";
    }
    echo "======= test case end =======\n";
}

