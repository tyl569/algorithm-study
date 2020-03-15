<?php
/**
 * 给定一个数组arr，已知其中所有的值都是非负的，将这个数组看作一个容器， 请返回容器能装多少水
 * 比如，arr = {3，1，2，5，2，4}，根据值画出的直方图就是容器形状，该容 器可以装下5格水
 * 再比如，arr = {4，5，1，3，2}，该容器可以装下2格水
 *
 */
function solution($height)
{
    $vol = 0;
    for ($i = 1; $i < count($height); $i++) {
        $leftMax = $height[$i - 1];
        $rightMax = $height[$i + 1];
        for ($j = 0; $j < $i; $j++) {
            $leftMax = max($leftMax, $height[$j]);
        }
        for ($k = $i + 1; $k < count($height); $k++) {
            $rightMax = max($rightMax, $height[$k]);
        }
        $min = min($leftMax, $rightMax);
        if ($min - $height[$i] > 0) {
            $vol += $min - $height[$i];
        }
    }
    return $vol;
}

// 空间换时间
function solution_2($height)
{
    $leftMax[0] = $height[0];
    $rightMax[count($height) - 1] = $height[count($height) - 1];
    for ($i = 1; $i < count($height); $i++) {
        $leftMax[$i] = max($height[$i], $leftMax[$i - 1]);
    }
    for ($i = count($height) - 2; $i >= 0; $i--) {
        $rightMax[$i] = max($height[$i], $rightMax[$i + 1]);
    }
    $vol = 0;
    for ($i = 0; $i < count($height); $i++) {
        $iVol = min($leftMax[$i], $rightMax[$i]) - $height[$i];
        $vol += ($iVol > 0 ? $iVol : 0);
    }
    return $vol;
}

// 双指针
function solution_3($height)
{
    $leftMax = 0; // 初始化左边最大值
    $rightMax = 0; // 初始化右边最大值
    $left = 0;
    $right = count($height) - 1;
    $vol = 0;
    while ($left < $right) {
        if ($height[$left] < $height[$right]) {
            if ($height[$left] >= $leftMax) {
                $leftMax = $height[$left];
            } else {
                $vol += $leftMax - $height[$left];
            }
            $left++;
        } else {
            if ($height[$right] >= $rightMax) {
                $rightMax = $height[$right];
            } else {
                $vol += $rightMax - $height[$right];
            }
            $right--;
        }
    }
    return $vol;
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    echo solution([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]) . "\n";
    echo solution([4, 5, 1, 3, 2]) . "\n";
    echo solution_2([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]) . "\n";
    echo solution_2([4, 5, 1, 3, 2]) . "\n";
    echo solution_3([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]) . "\n";
    echo solution_3([4, 5, 1, 3, 2]) . "\n";
    echo "======= test case end =======\n";
}