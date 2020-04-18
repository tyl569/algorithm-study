<?php

class Solution
{

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $count = 0;
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j] == 1) {
                    $count++;
                    $this->dfs($grid, $i, $j);
                }
            }
        }
        return $count;
    }

    function dfs(&$grid, $r, $c)
    {
        if (!isset($grid[$r][$c]) || $grid[$r][$c] == 0) {
            return;
        }
        $grid[$r][$c] = 0;
        $this->dfs($grid, $r - 1, $c);
        $this->dfs($grid, $r + 1, $c);
        $this->dfs($grid, $r, $c - 1);
        $this->dfs($grid, $r, $c + 1);
    }

    function numIslands_2($grid)
    {
        $count = 0;

        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j] == 1) {
                    $count++;
                    $grid[$i][$j] = 0;
                    $queue = new SplQueue();
                    $queue->push([$i, $j]);
                    while (!$queue->isEmpty()) {
                        $pop = $queue->dequeue();
                        $x = $pop[0];
                        $y = $pop[1];
                        if ($x + 1 < count($grid) && $grid[$x + 1][$y] == 1) {
                            $queue->push([$x + 1, $y]);
                            $grid[$x + 1][$y] = 0;
                        }
                        if ($x - 1 >= 0 && $grid[$x - 1][$y] == 1) {
                            $queue->push([$x - 1, $y]);
                            $grid[$x - 1][$y] = 0;
                        }
                        if ($y - 1 >= 0 && $grid[$x][$y - 1] == 1) {
                            $queue->push([$x, $y - 1]);
                            $grid[$x][$y - 1] = 0;
                        }
                        if ($y + 1 < count($grid[0]) && $grid[$x][$y + 1] == 1) {
                            $queue->push([$x, $y + 1]);
                            $grid[$x][$y + 1] = 0;
                        }
                    }

                }
            }
        }
        return $count;

    }

    function numIslands_3($grid)
    {
        if (empty($grid)) {
            return 0;
        }
        $rows = count($grid);
        $cols = count($grid[0]);
        $uf = new UnionFind($grid);
        $step = [
            [0, -1],
            [-1, 0],
            [1, 0],
            [0, 1]
        ];
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] == 1) {
                    for ($k = 0; $k < count($step); $k++) {
                        $newI = $i + $step[$k][0];
                        $newJ = $j + $step[$k][1];
                        if (isset($grid[$newI][$newJ]) && $grid[$newI][$newJ] == 1) {
                            $uf->union($this->node($i, $j, $cols), $this->node($newI, $newJ, $cols));
                        }
                    }
                }
            }
        }
        return $uf->getCount();
    }

    function node($i, $j, $cols)
    {
        return $i * $cols + $j;
    }
}

class UnionFind
{
    private $count = 0;

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    private $size;
    private $parent = [];

    public function __construct($grid)
    {
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                if ($grid[$i][$j] == 1) {
                    $this->count++;
                    $this->parent[$i * count($grid[0]) + $j] = $i * count($grid[0]) + $j;
                    $this->size[$i * count($grid[0]) + $j] = $i * count($grid[0]) + $j;
                }
            }
        }
    }

    // 返回根节点
    public function find($x)
    {
        while ($this->parent[$x] != $x) {
            // 节点压缩
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;
    }

    public function union($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        if ($rootB == $rootA) {
            return;
        }
        if ($rootB >= $rootA) {
            $this->parent[$rootA] = $rootB;
            $this->size[$rootB] += $this->size[$rootA];
        } else {
            $this->parent[$rootB] = $rootA;
            $this->size[$rootA] += $this->size[$rootB];
        }
        $this->count--;
    }

    // 验证根节点是否是同一个
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
    $grid = [
        [1, 1, 1],
        [0, 1, 0],
        [1, 0, 0],
        [1, 0, 1]
    ];
    echo (new Solution())->numIslands($grid) . "\n";
    echo (new Solution())->numIslands_2($grid) . "\n";
    echo (new Solution())->numIslands_3($grid) . "\n";

    $grid = [
        [1, 1, 1, 1, 0],
        [1, 1, 0, 1, 0],
        [1, 1, 0, 0, 0],
        [0, 0, 0, 0, 0]
    ];
    echo (new Solution())->numIslands($grid) . "\n";
    echo (new Solution())->numIslands_2($grid) . "\n";
    echo (new Solution())->numIslands_3($grid) . "\n";
    echo "======= test case end =======\n";
}