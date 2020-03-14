<?php
/**
 * 小Q得到一个神奇的数列: 1, 12, 123,...12345678910,1234567891011...。
 *
 * 并且小Q对于能否被3整除这个性质很感兴趣。
 *
 * 小Q现在希望你能帮他计算一下从数列的第l个到第r个(包含端点)有多少个数可以被3整除。
 *
 */

// 暴力解决
function solution($start, $end)
{
    $tmp = 1;
    for ($i = 2; $i <= $end; $i++) {
        $tmp .= $i;
        if ($i >= $start && $i <= $end) {
            $arr[] = $tmp;
        }
    }
    $num = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 3 == 0) {
            $num++;
        }
    }
    return $num;
}

/**
 * 找规律
 * 每三个数字一组
 *
 * 1            12              123
 * 1234         12345           123456
 * 1234567      123456798       123456789
 * ....
 *
 * 每组的第2、3个数字能够被3整除
 */
function solution2($start, $end)
{
    if ($start % 3 == 2) {
        $lN = intval($start / 3) * 2 + 1;
    } else {
        $lN = intval($start / 3) * 2;
    }
    if ($end % 3 == 2) {
        $rN = intval($end / 3) * 2 + 1;
    } else {
        $rN = intval($end / 3) * 2;
    }
    if ($start % 3 == 0 || ($start % 3 == 2 && $end % 3 == 2) || ($start % 3 == 2 && $end % 3 == 0)) {
        echo $rN - $lN + 1;
    } else if (($start % 3 == 2 && $end % 3 == 1)) {
        echo $rN - $lN + 2;
    } else {
        echo $rN - $lN;
    }
}

function mock()
{
    echo "========= test case start =========\n";
    echo solution(2, 5);
    echo "\n";
    echo solution(3, 10);
    echo "\n";
    echo solution2(2, 5);
    echo "\n";
    echo solution2(3, 10);
    echo "========= test case end =========\n";
}