<?php


/**
 * @param $array
 *
 *
 * 题目描述
 * 输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有的奇数位于数组的前半部分，所有的偶数位于数组的后半部分，并保证奇数和奇数，偶数和偶数之间的相对位置不变。
 *
 */
function reOrderArray($array)
{
    $tmp = [];
    $loc = 0; // 奇数的个数
    foreach ($array as $value) {
        if ($value & 1) {
            $loc++;
        }
    }
    $i = 0;
    $j = $loc;
    foreach ($array as $value) {
        if ($value & 1) {
            $tmp[$i++] = $value;
        } else {
            $tmp[$j++] = $value;
        }
    }
    ksort($tmp);
    return $tmp;
}

$ret = reOrderArray([1, 2, 3, 4, 5, 6, 7, 8, 9]);
var_dump($ret);