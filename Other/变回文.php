<?php
/**
 * 给定一个仅由小写字母组成的字符串。现在请找出一个位置，删掉那个字母之后，字符串变成回文。请放心总会有一个合法的解。如果给定的字符串已经是一个回文串，那么输出-1。
 * 输入描述:
 *
 * 第一行包含T，测试数据的组数。后面跟有T行，每行包含一个字符串。
 *
 * 输出描述:
 * 如果可以删去一个字母使它变成回文串，则输出任意一个满足条件的删去字母的位置（下标从0开始）。例如：
 * bcc
 *
 * 我们可以删掉位置0的b字符。
 */

// 收尾指针，如果收尾相同，向中间移动
function solution($str)
{
    $start = 0;
    $end = strlen($str) - 1;
    while ($start < $end) {
        if ($str{$start} == $str{$end}) {
            $start++;
            $end--;
        } else {
            if ($str{$start} == $str{$end - 1}) {
                return $end;
            }
            if ($str{$start + 1} == $str{$end - 1}) {
                return $start;
            }
        }
    }
    return -1;
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo solution("aaab")."\n";
    echo solution("baa")."\n";
    echo solution("aaa")."\n";
    echo solution("abccdba")."\n";
    echo "======= test case end =======\n";
}