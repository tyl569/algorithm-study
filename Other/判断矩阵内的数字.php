<?php
/**
 * 给定一个元素为非负整数的二维数组matrix，
 * 每行和每列都是从小到大有序的。
 *
 * 再给定一个非负整数aim，请判断aim是否在matrix中。
 *
 * 补充问题:给定一个二维矩阵，每一行都是0在1的左侧，求含有最多1的行号。
 */


function solution($matrix, $target)
{
    if ($matrix[count($matrix) - 1][count($matrix[0]) - 1] < $target) {
        return false;
    }
    for ($i = 0; $i < count($matrix); $i++) {
        $j = count($matrix[0]) - 1;
        if ($matrix[$i][$j] == $target) {
            return true;
        }
        if ($matrix[$i][$j] < $target) {
            continue;
        }
        while ($j >= 0) {
            if ($matrix[$i][$j] == $target) {
                return true;
            }
            $j--;
        }
    }
    return false;
}

function solution_2($matrix)
{
    $j = count($matrix[0]) - 1;
    $i = 0;
    $max = 0;
    $row = 0;
    while ($i < count($matrix) && $j >= 0) {
        if ($matrix[$i][$j] == 1) {
            $max++;
            $j--;
        } else {
            if ($matrix[$i + 1][$j] == 1) {
                $row = $i + 1;
            } else {
                $row = $i;
            }
            $i++;
        }
    }
    return $row;
}


mock();

function mock()
{
    echo "========= test case start =========\n";

    $matrix = [
        [1, 3, 5, 7],
        [10, 11, 16, 20],
        [23, 30, 34, 50]
    ];
    $num = 11;
    $ret = solution($matrix, $num);
    var_dump($ret);
    $num = 22;
    $ret = solution($matrix, $num);
    var_dump($ret);


    $matrix = [
        [0, 0, 0, 1, 1, 1],
        [0, 0, 0, 0, 1, 1],
        [1, 1, 1, 1, 1, 1],
        [0, 1, 1, 1, 1, 1],
        [0, 0, 0, 0, 0, 0]
    ];
    echo solution_2($matrix) . "\n";

    echo "========= test case end =========\n";
}