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
        $row = count($grid);
        $col = count($grid[0]);
        if ($r < 0 || $c < 0 || $r >= $row || $c >= $col || $grid[$r][$c] == 0) {
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
    echo "======= test case end =======\n";
}