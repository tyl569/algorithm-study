<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid)
    {
        $rows = count($grid);
        $cols = count($grid[0]);
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if (isset($grid[$i - 1][$j]) && isset($grid[$i][$j - 1])) {
                    $grid[$i][$j] = $grid[$i][$j] + min($grid[$i - 1][$j], $grid[$i][$j - 1]);
                } else if (isset($grid[$i - 1][$j])) {
                    $grid[$i][$j] = $grid[$i][$j] + $grid[$i - 1][$j];
                } else if (isset($grid[$i][$j - 1])) {
                    $grid[$i][$j] = $grid[$i][$j] + $grid[$i][$j - 1];
                }
            }
        }
        return $grid[$rows - 1][$cols - 1];
    }
}

function mock()
{
    echo "======= test case start =======\n";
    $grid = [
        [1, 3, 1],
        [1, 5, 1],
        [4, 2, 1]
    ];
    echo (new Solution())->minPathSum($grid) . "\n";
    echo "======= test case end =======\n";
}

mock();