<?php
/**
 *
 * 如果只由'('和')'两种字符组成的字符串中，每一个符号都有合理的匹配，我们说这个字符 串是完整的。
 *
 * 问题1:怎么判断只由'('和')'两种字符组成的字符串是完整的。
 *
 * 问题2:如果一个可能不完整的字符串，怎么求至少需要添加多少个括号能让其完整。
 *
 * 问题3:求只由'('和')'两种字符组成的字符串中，最大完整子串长度。
 */

function solution_1($s)
{
    $count = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s{$i} == "(") {
            $count++;
        } else {
            $count--;
        }
        if ($count < 0) {
            return false;
        }
    }
    return $count == 0;
}

function solution_2($s)
{
    $count = 0;
    $need = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s{$i} == "(") {
            $count++;
        } else {
            $count--;
        }
        if ($count == -1) {
            $need++;
            $count = 0;
        }
    }
    return $count + $need;
}

function solution_3($s)
{
    $max = 0;
    $dp = [];
    for ($i = 0; $i < strlen($s); $i++) {
        $dp[$i] = 0;
        if ($s{$i} == ")") {
            $pre = $i - 1 - (isset($dp[$i - 1]) ? $dp[$i - 1] : 0);
            if ($pre >= 0 && $s{$pre} == "(") {
                $dp[$i] = $dp[$i - 1] + 2 + (isset($dp[$pre - 1]) ? $dp[$pre - 1] : 0);
            }
        }
        $max = max($max, $dp[$i]);
    }
    return $max;
}


function mock()
{
    echo "=======test case for quest 1 start ====== \n";
    $ret1 = solution_1("()()()()");
    $ret2 = solution_1("()");
    $ret3 = solution_1("(((()))");
    $ret4 = solution_1("(((())))");
    var_dump($ret1, $ret2, $ret3, $ret4);
    echo "=======test case for quest 1 end ====== \n";
    echo "=======test case for quest 2 start ====== \n";
    $ret1 = solution_2("()");
    $ret2 = solution_2("(())");
    $ret3 = solution_2(")()()(");
    $ret4 = solution_2(")))(((");
    var_dump($ret1, $ret2, $ret3, $ret4);
    echo "=======test case for quest 2 end ====== \n";
    echo "=======test case for quest 3 start ====== \n";
    $ret1 = solution_3("()");
    $ret2 = solution_3("(())");
    $ret3 = solution_3(")()()(");
    $ret4 = solution_3("((())(())");
    var_dump($ret1, $ret2, $ret3, $ret4);
    echo "=======test case for quest 3 end ====== \n";
}

mock();
