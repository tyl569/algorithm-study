<?php

/**
 *
 * 题目描述
 * 请实现一个函数，将一个字符串中的每个空格替换成“%20”。
 * 例如，当字符串为We Are Happy.则经过替换之后的字符串为We%20Are%20Happy。
 *
 *
 * @param $str
 * @return string
 */
function replaceSpace($str)
{
    $start = 0;
    $newStr = "";
    while ($start < strlen($str)) {
        if ($str{$start} == " ") {
            $newStr .= "%20";
        } else {
            $newStr .= $str{$start};

        }
        $start++;
    }
    return $newStr;
}

echo replaceSpace("We Are Happy") . "\n";
echo replaceSpace("hello world") . "\n";