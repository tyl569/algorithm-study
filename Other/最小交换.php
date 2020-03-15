<?php
/**
 * 有n个打包机器从左到右一字排开，上方有一个自动装置会抓取一批放物品到每个打 包机上，
 * 放到每个机器上的这些物品数量有多有少，由于物品数量不相同，
 * 需要工人 将每个机器上的 物品进行移动从而到达物品数量相等才能打包。
 * 每个物品重量太大、 每次只能搬一个物品进 行移动，为了省力，只在相邻的机器上移动。
 * 请计算在搬动最 小轮数的前提下，使每个机器 上的物品数量相等。
 * 如果不能使每个机器上的物品相同， 返回-1。
 *
 * 例如[1,0,5]表示有3个机 器，每个机器上分别有1、0、5个物品，经过这些轮后:
 * 第一轮:1 0 <- 5 => 1 1 4  第二轮:1 <- 1 <- 4 => 2 1 3  第三轮:2 1 <- 3 => 2 22
 * 移动了3轮，每个机器上的物品相等，所以返回3
 *
 * 例如[2,2,3]表示有3个机器，每个机器上分别有2、2、3个物品， 这些物品不管怎么移动，都 不能使三个机器上物品数量相等，返回-1
 *
 */

function solution($arr)
{
    $sum = array_sum($arr);
    if ($sum % count($arr) != 0) {
        return -1;
    }
    $arg = $sum / count($arr);
    $leftSum = 0;
    $min = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $leftRest = $leftSum - $i * $arg; // 左边剩余的数量
        $rightRest = $sum - $leftSum - $arr[$i] - (count($arr) - $i - 1) * $arg;// 右边剩余的数量
        if ($leftRest < 0 && $rightRest < 0) {
            $min = max($min, abs($leftRest) + abs($rightRest));
        } else {
            $min = max($min, abs($leftRest), abs($rightRest));
        }
        $leftSum += $arr[$i];
    }
    return $min;
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo solution([1, 0, 5]) . "\n";
    echo "======= test case end =======\n";
}