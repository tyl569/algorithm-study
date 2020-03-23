<?php

function solution($x, $y)
{
    $row = $col = $x + 1;
    $matrix = [];
    for ($i = 0; $i < $row; $i++) {
        $matrix[$i][0] = 1;
        $matrix[0][$i] = 1;
    }
    for ($i = 1; $i < $row; $i++) {
        for ($j = 1; $j < $col; $j++) {
            $matrix[$i][$j] = $matrix[$i - 1][$j] + $matrix[$i][$j - 1];
        }
    }

    return $matrix[$row - $y - 1][$y];
}

mock();

function mock()
{
    echo "====== test case start =======\n";
    echo solution(4, 1) . "\n";
    echo solution(4, 2) . "\n";
    echo solution(4, 3) . "\n";
    echo "======= test case start =======\n";
}