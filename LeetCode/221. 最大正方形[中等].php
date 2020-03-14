<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix)
    {
        if (empty($matrix)) {
            return 0;
        }
        $rows = count($matrix);
        $cols = count($matrix[0]);
        $len = 0;
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($matrix[$i][$j] > 0) {
                    $matrix[$i][$j] = min($matrix[$i - 1][$j], $matrix[$i][$j - 1], $matrix[$i - 1][$j - 1]) + 1;
                }
                $len = max($len, $matrix[$i][$j]);
            }
        }
        return $len * $len;
    }
}

function mock()
{
    echo "========= test case start =========\n";
    $matrix1 = [
        [0, 1, 1, 1, 0],
        [1, 1, 1, 1, 1],
        [0, 1, 1, 1, 1],
        [0, 1, 1, 1, 1],
        [0, 0, 1, 1, 1]
    ];
    echo (new Solution())->maximalSquare($matrix1) . "\n";
    echo "========= test case end =========\n";
}

mock();