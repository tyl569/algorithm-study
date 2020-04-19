<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        $cols = [];
        $rows = [];
        $boxes = [];
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] != ".") {
                    $num = $board[$i][$j];
                    $rows[$i][$num] = isset($rows[$i][$num]) ? $rows[$i][$num] + 1 : 1;
                    $cols[$j][$num] = isset($cols[$j][$num]) ? $cols[$j][$num] + 1 : 1;
                    $boxIndex = intval($i / 3) * 3 + intval($j / 3);
                    $boxes[$boxIndex][$num] = isset($boxes[$boxIndex][$num]) ? $boxes[$boxIndex][$num] + 1 : 1;
                    if ($rows[$i][$num] > 1 || $cols[$j][$num] > 1 || $boxes[$boxIndex][$num] > 1) {
                        return false;
                    }
                }
            }
        }
        return true;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $board = [
        ["5", "3", ".", ".", "7", ".", ".", ".", "."],
        ["6", ".", ".", "1", "9", "5", ".", ".", "."],
        [".", "9", "8", ".", ".", ".", ".", "6", "."],
        ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
        ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
        ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
        [".", "6", ".", ".", ".", ".", "2", "8", "."],
        [".", ".", ".", "4", "1", "9", ".", ".", "5"],
        [".", ".", ".", ".", "8", ".", ".", "7", "9"]
    ];
    var_dump((new Solution())->isValidSudoku($board));
    $board = [
        ["8", "3", ".", ".", "7", ".", ".", ".", "."],
        ["6", ".", ".", "1", "9", "5", ".", ".", "."],
        [".", "9", "8", ".", ".", ".", ".", "6", "."],
        ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
        ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
        ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
        [".", "6", ".", ".", ".", ".", "2", "8", "."],
        [".", ".", ".", "4", "1", "9", ".", ".", "5"],
        [".", ".", ".", ".", "8", ".", ".", "7", "9"]
    ];
    var_dump((new Solution())->isValidSudoku($board));
    echo "======= test case start =======\n";
}