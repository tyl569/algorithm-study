<?php

/**
 * 牛牛准备参加学校组织的春游, 出发前牛牛准备往背包里装入一些零食, 牛牛的背包容 量为w。
 * 牛牛家里一共有n袋零食, 第i袋零食体积为v[i]。
 * 牛牛想知道在总体积不超过背包容量的情况下，他一共有多少种零食放法(总体积为0也 算一种放法)。
 */

function solution($w, $arr)
{
    return process($arr, 0, $w);
}

function process($arr, $i, $rest)
{
    if ($rest < 0) {
        return 0;
    }
    if ($i == count($arr)) {
        return 1;
    }

    $next = process($arr, $i + 1, $rest); // 第i个零食没装
    $next_2 = process($arr, $i + 1, $rest - $arr[$i]); // 第i个零食装联调
    return $next + $next_2;
}

function solution_2($w, $arr)
{
    $dp = [];
    for ($i = 0; $i <= $w; $i++) {
        $dp[count($arr)][$i] = 1;
    }
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        for ($j = 0; $j <= $w; $j++) {
            $dp[$i][$j] = $dp[$i + 1][$j] + (($j - $arr[$i] >= 0) ? $dp[$i + 1][$j - $arr[$i]] : 0);
        }
    }
    return $dp[0][$w];
}

mock();
function mock()
{
    echo "======= test case start =======\n";
    echo solution(10, [3, 2, 5, 7]) . "\n";
    echo solution_2(10, [3, 2, 5, 7]) . "\n";
    echo "======= test case end =======\n";
}