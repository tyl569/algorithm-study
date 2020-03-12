<?php
/**
 * 将给定的数转换为字符串，原则如下:1对应 a，2对应b，.....26对应z，
 *
 * 例如12258 可以转 换为"abbeh", "aveh", "abyh", "lbeh" and "lyh"，个数为5，
 *
 * 编写一个函 数，给出可以转 换的不同字符串的个数。
 */

function solution($str)
{
    return process($str, 0);
}

function process($str, $index)
{
    if ($index == strlen($str)) {
        return 1;
    }
    if ($str{$index} == 0) {
        return 0;
    }
    $res = process($str, $index + 1);
    if ($index == strlen($str) - 1) {
        return $res;
    }
    if ($str{$index} * 10 + $str{$index + 1} < 27) {
        $res += process($str, $index + 2);
    }
    return $res;
}

function process2($str)
{
    $dp[strlen($str)] = 1;
    $dp[strlen($str) - 1] = $str{strlen($str) - 1} == 0 ? 0 : 1;
    for ($i = strlen($str) - 2; $i >= 0; $i--) {
        if ($str{$i} == 0) {
            $dp[$i] = 0;
        } else {
            $dp[$i] = $dp[$i + 1] + (($str{$i} * 10 + $str{$i + 1}) < 27 ? $dp[$i + 2] : 0);
        }
    }
    return $dp[0];

}

echo solution("1223");
echo "\n";
echo process2("1223");