<?php
/**
 * 给定一个非负整数n，代表二叉树的节点个数。返回能形成多少种不同的二叉树 结构。
 */
function solution($n)
{
    if ($n == 0) {
        return 1;
    }
    if ($n == 1) {
        return 1;
    }
    if ($n == 2) {
        return 2;
    }
    $res = 0;
    // 根节点占用了一个
    for ($i = 0; $i <= $n - 1; $i++) {
        $leftNum = solution($i);
        $rightNum = solution($n - 1 - $i);
        $res += $leftNum * $rightNum;
    }
    return $res;
}

function solution2($n)
{
    if ($n < 2) {
        return 1;
    }
    $dp = [];
    $dp[0] = 1;
    for ($i = 1; $i < $n + 1; $i++) {
        for ($j = 1; $j < $i + 1; $j++) {
            $dp[$i] += $dp[$j - 1] * $dp[$i - $j];
        }
    }
    return $dp[$n];
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo solution(3) . "\n";
    echo solution2(3) . "\n";
    echo "======= test case end =========\n";
}