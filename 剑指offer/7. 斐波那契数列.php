<?php

/**
 * @param $n
 *
 * 题目描述
 * 大家都知道斐波那契数列，现在要求输入一个整数n，请你输出斐波那契数列的第n项（从0开始，第0项为0，第1项是1）。
 * n<=39
 */
function Fibonacci($n)
{
    $num1 = 0;
    $num2 = 1;
    if ($n == 0) {
        return $num1;
    }
    if ($n == 1) {
        return 1;
    }

    for ($i = 2; $i <= $n; $i++) {
        $num = $num1 + $num2;
        $num1 = $num2;
        $num2 = $num;
    }
    return $num;
}

function Fibonacci_2($n)
{
    $sqrt5 = sqrt(5);
    $fabN = pow(((1 + $sqrt5) / 2), $n) - pow(((1 - $sqrt5) / 2), $n);
    return intval($fabN / $sqrt5);
}


echo Fibonacci(3) . "\n";
echo Fibonacci_2(3) . "\n";