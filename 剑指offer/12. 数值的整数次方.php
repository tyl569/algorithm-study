<?php

/**
 * @param $base
 * @param $exponent
 *
 *
 * 题目描述
 * 给定一个double类型的浮点数base和int类型的整数exponent。求base的exponent次方。
 *
 * 保证base和exponent不同时为0
 */
function Power($base, $exponent)
{
    if ($exponent < 0) {
        $base = 1 / $base;
        $exponent = -$exponent;
    }
    $cur = $base;
    $ret = 1;
    for ($i = $exponent; $i; $i = intval($i / 2)) {
        if ($i & 1) {
            $ret *= $cur;
        }
        $cur *= $cur;
    }
    return $ret;
}

echo Power(2, 3) . "\n";