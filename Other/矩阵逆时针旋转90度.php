<?php
function solution(&$matrix)
{
    $a = 0;
    $b = 0;
    $c = count($matrix) - 1;
    $d = count($matrix[0]) - 1;
    while ($a < $c) {
        rotate($matrix, $a++, $b++, $c--, $d--);
    }
    return $matrix;
}

function rotate(&$matrix, $a, $b, $c, $d)
{
    for ($i = 0; $i < $d - $b; $i++) {
        $tmp = $matrix[$a + $i][$b];
        $matrix[$a + $i][$b] = $matrix[$a][$d - $i];
        $matrix[$a][$d - $i] = $matrix[$c - $i][$d];
        $matrix[$c - $i][$d] = $matrix[$c][$b + $i];
        $matrix[$c][$b + $i] = $tmp;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $matrix = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];
    echo "旋转之前:\n";
    printMatrix($matrix);
    echo "旋转之后:\n";
    solution($matrix);
    printMatrix($matrix);

    $matrix = [
        [5, 1, 9, 11],
        [2, 4, 8, 10],
        [13, 3, 6, 7],
        [15, 14, 12, 16]
    ];
    echo "旋转之前:\n";
    printMatrix($matrix);
    echo "旋转之后:\n";
    solution($matrix);
    printMatrix($matrix);

    echo "======= test case end =======\n";
}

function printMatrix($matrix)
{
    echo "\n";
    for ($i = 0; $i < count($matrix); $i++) {
        for ($j = 0; $j < count($matrix[0]); $j++) {
            $content = $matrix[$i][$j] . ", ";
            if ($j == count($matrix[0]) - 1) {
                $content .= "\n";
            }
            echo $content;
        }
    }
    echo "\n";
}