<?php

/**
 * @param $number
 *
 * 题目描述
 * 一只青蛙一次可以跳上1级台阶，也可以跳上2级。求该青蛙跳上一个n级的台阶总共有多少种跳法（先后次序不同算不同的结果）。
 *
 */
function jumpFloor($number)
{
    $sqrt5 = sqrt(5);
    $fibN = pow(((1 + $sqrt5) / 2), $number + 1) - pow(((1 - $sqrt5) / 2), $number + 1);
    return intval($fibN / $sqrt5);
}

echo jumpFloor(1) . "\n";
echo jumpFloor(2) . "\n";