<?php
/**
 * 有一个X*Y的网格，小团要在此网格上从左上角到右下角，
 *
 * 只能走格点且只能向右或向下走。
 *
 * 请设计一个算法，计算小团有多少种走法。给定两个正整数int x,int y，请返回小团的走法数目。
 *
 */

function solution($x, $y)
{
    $dp = [];
    for ($i = 0; $i < $x; $i++) {
        $dp[$i][0] = 1;
    }
    for ($j = 0; $j < $y; $j++) {
        $dp[0][$j] = 1;
    }

    for ($i = 1; $i < $x; $i++) {
        for ($j = 1; $j < $y; $j++) {
            $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
        }
    }
    return $dp[$x - 1][$y - 1];
}


// 空间压缩
// O(M*N)->O(M)
function solution2($x, $y)
{
    $dp = [];
    for ($i = 0; $i < $y; $i++) {
        $dp[$i] = 1;
    }

    for ($i = 1; $i < $x; $i++) {
        for ($j = 1; $j < $y; $j++) {
            $tmp = $dp[$j];
            $dp[$j] = $dp[$j - 1] + $tmp;
        }
    }
    return $dp[$y - 1];
}

function mock()
{
    echo "========= test case start =========\n";
    echo solution(10, 10);
    echo "\n";
    echo solution2(10, 10);
    echo "========= test case end =========\n";
}