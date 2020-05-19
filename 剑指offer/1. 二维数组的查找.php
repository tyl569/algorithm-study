<?php

/**
 * 题目描述
 *
 * 题目描述
 * 在一个二维数组中（每个一维数组的长度相同），每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。
 * 请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
 *
 *
 * @param $target
 * @param $array
 */
function Find($target, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        $j = count($array[0]) - 1;
        while ($j >= 0 && $i < count($array)) {
            if ($target == $array[$i][$j]) {
                return true;
            }
            if ($target < $array[$i][$j]) {
                $j--;
                continue;
            }
            if ($target > $array[$i][$j]) {
                $i++;
            }
        }
    }
    return false;
}
$array = [
    [1, 2, 3, 4, 5],
    [6, 7, 8, 9, 10],
    [11, 12, 13, 14, 15],
    [16, 17, 18, 19, 20],
    [21, 22, 23, 24, 25, 26]
];

var_dump(Find(13, $array));

var_dump(Find(30, $array));
$array = [
    [1, 2, 8, 9],
    [2, 4, 9, 12],
    [4, 7, 10, 13],
    [6, 8, 11, 15]
];
var_dump(Find(7, $array));
var_dump(Find(16, $array));