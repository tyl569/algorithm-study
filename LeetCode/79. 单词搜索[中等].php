<?php

class Solution
{

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    private $step = [[0, -1], [0, 1], [-1, 0], [1, 0]];
    private $marked = [];
    private $board = [];
    private $word = "";

    function exist($board, $word)
    {
        $this->board = $board;
        $this->word = $word;
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                $this->marked[$i][$j] = false;
            }
        }
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                if ($this->dfs($i, $j, 0)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function dfs($i, $j, $start)
    {
        if ($start == strlen($this->word) - 1) {
            return $this->word{$start} == $this->board[$i][$j];
        }
        if ($this->board[$i][$j] == $this->word{$start}) {
            $this->marked[$i][$j] = true;
            foreach ($this->step as $step) {
                $newX = $i + $step[0];
                $newY = $j + $step[1];
                if ($this->inArea($newX, $newY) && $this->marked[$newX][$newY] == false) {
                    if ($this->dfs($newX, $newY, $start + 1)) {
                        return true;
                    }
                }

            }
            $this->marked[$i][$j] = false;
        }
        return false;
    }

    public function inArea($x, $y)
    {
        return isset($this->board[$x][$y]);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $board = [
        ['A', 'B', 'C', 'E'],
        ['S', 'F', 'C', 'S'],
        ['A', 'D', 'E', 'E']
    ];
    var_dump((new Solution())->exist($board, "ABCCED"));
    var_dump((new Solution())->exist($board, "SEE"));
    var_dump((new Solution())->exist($board, "ABCB"));
    echo "======== test case end =======\n";
}