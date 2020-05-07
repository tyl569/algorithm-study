<?php

/**
 * @param $number
 *
 * 题目描述
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级……它也可以跳上n级。求该青蛙跳上一个n级的台阶总共有多少种跳法。
 */
$memo = [];

function jumpFloorII($number)
{
    global $memo;
    // write code here
    if ($number == 1) {
        return 1;
    }
    $memo[$number] = 2 * jumpFloorII($number - 1);
    return $memo[$number];
}


function jumpFloorII_2($number)
{
    if ($number == 1) {
        return 1;
    }
    $tmp1 = 1;
    $tmp2 = 1;
    for ($i = 2; $i <= $number; $i++) {
        $tmp2 = 2 * $tmp1;
        $tmp1 = $tmp2;
    }
    return $tmp2;
}

echo jumpFloorII(2) . "\n";
echo jumpFloorII(2) . "\n";
echo jumpFloorII_2(10) . "\n";
echo jumpFloorII_2(10) . "\n";