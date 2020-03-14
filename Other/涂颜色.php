<?php
/**
 * 牛牛有一些排成一行的正方形。每个正方形已经被染成红色或者绿色。
 * 牛牛现在可 以选 择任意一个正方形然后用这两种颜色的任意一种进行染色,这个正方形的颜色将 会被覆盖。
 * 牛牛的目标是在完成染色之后,每个红色R都比每个绿色G距离最左侧近。 牛牛想知道他最 少需要涂染几个正方形。
 * 如样例所示: s = RGRGR 我们涂染之后变成RRRGG满足要求了,涂染的个数为2。
 */
/**
 * 动态规划
 *
 * 使用2个辅助数组，分别从左向右计算G的个数，从右向左计算R的个数
 */


function bestAnswer($str)
{
    $left = [];
    $right = [];
    $m = 0;
    $n = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str{$i} == "G") {
            $m++;
        } else {
            $m = $left[$i - 1] ?? 0;
        }
        $left[$i] = $m;
    }
    for ($j = strlen($str) - 1; $j >= 0; $j--) {
        if ($str{$j} == "R") {
            $n++;;
        } else {
            $right[$j] = $right[$i + 1] ?? 0;
        }
        $right[$j] = $n;
    }
    $min = $left[0] + $right[1];
    for ($k = 1; $k < strlen($str); $k++) {
        $min = min($min, $left[$k] + $right[$k + 1]);
    }
    return $min;
}


function mock()
{
    echo "========= test case start =========\n";
    $str = "GRRRGGRG";
    $str = "GRRRRGRG";
    $str = "GGRRGGRG";
    bestAnswer($str);
    echo "========= test case end =========\n";
}