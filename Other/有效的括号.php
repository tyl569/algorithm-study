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
    $len = strlen($s);
    $num = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($s{$i} == "(") {
            $num++;
        }
        if ($s{$i} == ")") {
            $num--;
        }
        if ($num < 0) {
            return false;
        }

    }
    return $num == 0;
}

function solution_2($s)
{
    $count = $need = 0;
    for ($i = 0; $i < strlen($s); $i++) {
        if ($s{$i} == "(") {
            $count++;
        }
        if ($s{$i} == ")") {
            $count--;
        }
        if ($count == -1) {
            $need++;
            $count = 0;
        }
    }
    return $count + $need;
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
}

mock();
