<?php

/**
 * @param $index
 *
 * 题目描述
 * 把只包含质因子2、3和5的数称作丑数（Ugly Number）。
 * 例如6、8都是丑数，但14不是，因为它包含质因子7。 习惯上我们把1当做是第一个丑数。求按从小到大的顺序的第N个丑数。
 *
 */
function GetUglyNumber_Solution($index)
{
    if ($index == 0) {
        return 0;
    }
    $a = 0;
    $b = 0;
    $c = 0;
    $dp[0] = 1;
    for ($i = 1; $i < $index; $i++) {
        $n2 = $dp[$a] * 2;
        $n3 = $dp[$b] * 3;
        $n5 = $dp[$c] * 5;
        $dp[$i] = min($n2, $n3, $n5);
        if ($dp[$i] == $n2) {
            $a++;
        }
        if ($dp[$i] == $n3) {
            $b++;
        }
        if ($dp[$i] == $n5) {
            $c++;
        }
    }
    return $dp[$index - 1];
}