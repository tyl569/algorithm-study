<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $a = 0;
        $b = 0;
        $c = count($matrix[0]) - 1;
        $d = count($matrix) - 1;
        while ($a < $c) {
            $this->rotateArr($matrix, $a++, $b++, $c--, $d--);
        }
        return $matrix;
    }

    function rotateArr(&$matrix, $a, $b, $c, $d)
    {
        for ($i = 0; $i < $d - $b; $i++) {
            $tmp = $matrix[$a][$b + $i];
            $matrix[$a][$b + $i] = $matrix[$c - $i][$b];
            $matrix[$c - $i][$b] = $matrix[$c][$d - $i];
            $matrix[$c][$d - $i] = $matrix[$a + $i][$d];
            $matrix[$a + $i][$d] = $tmp;
        }
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
    (new Solution())->rotate($matrix);
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
    (new Solution())->rotate($matrix);
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