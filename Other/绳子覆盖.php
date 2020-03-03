<?php
/**
 * 给定一个有序数组arr，代表数轴上从左到右有n个点arr[0]、arr[1]...arr[n-1]。给定一 个正数L，代表一根长度为L的绳子，求绳子最多能覆盖其中的几个点。
 */
// 暴力解决
function violence($arr, $l)
{
    if (count($arr) == 0) {
        return 0;
    }
    $lenArr = [];
    for ($i = 0; $i < count($arr); $i++) {
        $start = 1;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$j] - $arr[$i] <= $l) {
                $start++;
            }
        }
        $lenArr[] = $start;
    }
    return max($lenArr);
}
// 滑动窗口
function slideWind($arr, $l)
{
    if (count($arr) == 0) {
        return 0;
    }
    $lenArr = [];
    $left = 0;
    $right = 0;
    $start = 0;
    while ($left < count($arr) && $right < count($arr)) {
        if ($arr[$right] <= $arr[$left] + $l) {
            $start++;
            $lenArr[$left] = $start;
            $right++; // 右边界继续移动
        } else {
            $left++;
            $right = $left;
            $start = 0;
        }
    }
    return max($lenArr);
}

$testArr = [1, 3, 7, 10, 12]; // 数组
$l = 8; // 绳子长度
echo violence($testArr, $l);
echo "\n";
echo slideWind($testArr, $l);