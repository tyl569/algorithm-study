<?php


/**
 * @param $str
 *
 *
 * 题目描述
 * 输入一个字符串,按字典序打印出该字符串中字符的所有排列。
 * 例如输入字符串abc,则打印出由字符a,b,c所能排列出来的所有字符串abc,acb,bac,bca,cab和cba。
 */

$result = [];

function Permutation($str)
{
    if (empty($str)) {
        return [];
    }
    global $result;
    $strArr = str_split($str);
    sort($strArr);
    $used = array_fill(0, count($strArr), false);
    helper($strArr, [], $used);
    return $result;
}

function helper($strArr, $list, $used)
{
    global $result;
    if (count($list) == count($strArr)) {
        $result[] = implode("", $list);
    }
    for ($i = 0; $i < count($strArr); $i++) {
        if ($used[$i]) {
            continue;
        }
        if ($i > 0  && $strArr[$i - 1] == $strArr[$i] && $used[$i-1]) {
            continue;
        }
        $used[$i] = true;
        $list[] = $strArr[$i];
        helper($strArr, $list, $used);
        $used[$i] = false;
        array_pop($list);
    }
}

var_dump(Permutation('aa'));

