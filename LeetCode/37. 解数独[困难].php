<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board)
    {
        $this->backtrack($board, 0, 0);

    }

    function backtrack(&$board, $i, $j)
    {
        $endRowNum = 9;
        $endColNum = 9;
        if ($j == $endColNum) {
            // 穷举到最后一列，从下一行开始
            return $this->backtrack($board, $i + 1, 0);
        }
        if ($i == $endRowNum) {
            return true;
        }
        if ($board[$i][$j] != ".") { // 如果该位置预设了数字，不用管，继续
            return $this->backtrack($board, $i, $j + 1);
        }
        for ($k = 1; $k <= 9; $k++) {
            if (!$this->invalid($board, $i, $j, $k)) {
                continue;
            }
            $board[$i][$j] = strval($k);
            if ($this->backtrack($board, $i, $j + 1)) {
                return true;
            }
            $board[$i][$j] = ".";
        }
        return false;
    }

    function invalid($board, $i, $j, $num)
    {
        for ($k = 0; $k < 9; $k++) {
            if ($board[$i][$k] == $num) {
                return false;
            }
            if ($board[$k][$j] == $num) {
                return false;
            }
            if ($board[intval($i / 3) * 3 + intval($k / 3)][intval($j / 3) * 3 + $k % 3] == $num) {
                return false;
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
    (new Solution())->solveSudoku($board);
    var_dump($board);

    echo "======= test case end =======\n";
}