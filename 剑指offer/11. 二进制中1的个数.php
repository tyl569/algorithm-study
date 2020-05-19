<?php


/**
 * @param $n
 *
 * 题目描述
 * 输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。
 *
 */
function NumberOf1($n)
{
    $mask = 1;
    $count = 0;
    for ($i = 0; $i < 32; $i++) {
        if ($n & $mask) {
            $count++;
        }
        $mask <<= 1;
    }
    return $count;
}

echo NumberOf1(1) . "\n";
echo NumberOf1(5) . "\n";
echo NumberOf1(10) . "\n";