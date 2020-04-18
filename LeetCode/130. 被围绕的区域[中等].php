<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board)
    {
        $m = count($board);
        $n = count($board[0]);
        $dummy = $m * $n;
        $uf = new UF($dummy + 1);

        $step = [
            [0, 1],
            [0, -1],
            [1, 0],
            [-1, 0]
        ];
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($board[$i][$j] == "O") {
                    // 如果边缘是O，则和$dummy进行连通
                    if ($i == 0 || $i == $m - 1 || $j == 0 || $j == $n - 1) {
                        $uf->union($this->node($i, $j, $n), $dummy);
                    } else {
                        for ($k = 0; $k < count($step); $k++) {
                            $newI = $i + $step[$k][0];
                            $newJ = $j + $step[$k][1];
                            if (isset($board[$newI][$newJ]) && $board[$newI][$newJ] == "O") {
                                $uf->union($this->node($i, $j, $n), $this->node($newI, $newJ, $n));
                            }
                        }
                    }
                }
            }
        }

        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($uf->connected($this->node($i, $j, $n), $dummy)) {
                    $board[$i][$j] = "O";
                } else {
                    $board[$i][$j] = "X";
                }
            }
        }
    }

    function node($i, $j, $n)
    {
        return $i * $n + $j;
    }

    function solve_2(&$board)
    {
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                $isEdge = ($i == 0 || $i == count($board) - 1 || $j == 0 | $j == count($board[0]) - 1);
                // 从边缘开始dfs, 把和边缘连通的O检索出来，替换成#
                if ($isEdge && $board[$i][$j] == "O") {
                    $this->dfs($board, $i, $j);
                }
            }
        }
        for ($i = 0; $i < count($board); $i++) {
            for ($j = 0; $j < count($board[0]); $j++) {
                if ($board[$i][$j] == "O") {
                    $board[$i][$j] = "X";
                }
                if ($board[$i][$j] == "#") {
                    $board[$i][$j] = "O";
                }
            }
        }
    }

    function dfs(&$board, $i, $j)
    {
        if (!isset($board[$i][$j]) || $board[$i][$j] == "X" || $board[$i][$j] == "#") {
            return;
        }
        $board[$i][$j] = "#";
        $this->dfs($board, $i + 1, $j);
        $this->dfs($board, $i - 1, $j);
        $this->dfs($board, $i, $j + 1);
        $this->dfs($board, $i, $j - 1);
    }
}

class UF
{
    private $count = 0;
    private $parent = [];
    private $size = [];

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return array
     */
    public function getParent(): array
    {
        return $this->parent;
    }

    /**
     * @return array
     */
    public function getSize(): array
    {
        return $this->size;
    }

    public function __construct($n)
    {
        $this->count = $n;
        for ($i = 0; $i < $n; $i++) {
            $this->size[$i] = $i;
            $this->parent[$i] = $i;
        }
    }

    public function union($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        if ($rootA == $rootB) {
            return;
        }
        if ($rootB >= $rootA) {
            $this->parent[$rootA] = $rootB;
            $this->size[$rootB] += $rootA;
        } else {
            $this->parent[$rootB] = $rootA;
            $this->size[$rootA] += $rootB;
        }
        $this->count--;
    }

    public function find($x)
    {
        while ($x != $this->parent[$x]) {
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;
    }

    public function connected($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        return $rootA == $rootB;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $board = [
        ["X", "X", "X", "X"],
        ["X", "O", "O", "X"],
        ["X", "X", "O", "X"],
        ["X", "O", "X", "X"],
    ];
    (new Solution())->solve($board);
//    (new Solution())->solve_2($board);
    var_dump($board);

    echo "======= test case end =======\n";
}