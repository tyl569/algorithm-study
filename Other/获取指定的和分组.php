<?php
/**
 * 给出一列数字，找出满足和的数的分组
 *
 * 比如：7 [2,4,6,1,3,5,7]
 *
 * 结果为:
 * [
 *  [1,6],
 *  [2,5],
 *  [3,4]
 * ]
 */

function solution($sum, $arr)
{
    sort($arr);
    $start = 0;
    $end = count($arr) - 1;
    $res = [];
    while ($start < $end) {
        if ($arr[$start] + $arr[$end] == $sum) {
            $res[] = [$arr[$start], $arr[$end]];
            $start++;
            $end--;
        }
        if ($arr[$start] + $arr[$end] > $sum) {
            $end--;
        }
        if ($arr[$start] + $arr[$end] < $sum) {
            $start++;
        }
    }
    return $res;
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump(solution(7, [2, 4, 6, 1, 3, 5, 7]));
    echo "======= test case end =======\n";
}