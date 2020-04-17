<?php

class Solution
{

    /**
     * @param Integer[][] $M
     * @return Integer
     */
    function findCircleNum($M)
    {
        if (empty($M)) {
            return 0;
        }
        $count = 0;
        $visited = array_fill(0, count($M), 0);
        for ($i = 0; $i < count($M); $i++) {
            if ($visited[$i] == 0) {
                $this->dfs($M, $visited, $i);
                $count++;
            }
        }
        return $count;
    }

    function dfs($M, &$visited, $i)
    {
        for ($j = 0; $j < count($M[0]); $j++) {
            if ($M[$i][$j] == 1 && $visited[$j] == 0) {
                $visited[$j] = 1;
                $this->dfs($M, $visited, $j);
            }
        }

    }

    function findCircleNum_2($M)
    {
        if (empty($M)) {
            return 0;
        }
        $uf = new UF(count($M));
        for ($i = 0; $i < count($M); $i++) {
            for ($j = 0; $j < count($M[0]); $j++) {
                if ($M[$i][$j] == 1) {
                    $uf->union($i, $j);
                }
            }
        }
        return $uf->getCount();
    }
}

class UF
{
    private $count = 0;
    private $parent = [];
    private $size = [];

    /**
     * @return array
     */
    public function getSize(): array
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getParent(): array
    {
        return $this->parent;
    }

    function __construct($n)
    {
        $this->count = $n;
        for ($i = 0; $i < $n; $i++) {
            $this->parent[$i] = $i;
            $this->size[$i] = $i;
        }
    }

    function union($a, $b)
    {
        $rootA = $this->find($a);
        $rootB = $this->find($b);
        if ($rootA == $rootB) {
            return;
        }
        if ($this->size[$rootA] > $this->size[$rootB]) {
            $this->parent[$rootB] = $rootA;
            $this->size[$rootA] += $this->size[$rootB];
        } else {
            $this->parent[$rootA] = $rootB;
            $this->size[$rootB] += $this->size[$rootA];
        }
        $this->count--;
    }

    function find($x)
    {
        while ($this->parent[$x] != $x) {
            $this->parent[$x] = $this->parent[$this->parent[$x]];
            $x = $this->parent[$x];
        }
        return $x;

    }

    function connected($a, $b)
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

    $M = [
        [1, 1, 0],
        [1, 1, 0],
        [0, 0, 1]
    ];
    echo (new Solution())->findCircleNum($M) . "\n";
    echo (new Solution())->findCircleNum_2($M) . "\n";

    $M = [
        [1, 1, 0],
        [1, 1, 1],
        [0, 1, 1]
    ];
    echo (new Solution())->findCircleNum($M) . "\n";
    echo (new Solution())->findCircleNum_2($M) . "\n";

    $M = [
        [1, 0, 0, 1],
        [0, 1, 1, 0],
        [0, 1, 1, 1],
        [1, 0, 1, 1]
    ];
    echo (new Solution())->findCircleNum($M) . "\n";
    echo (new Solution())->findCircleNum_2($M) . "\n";

    echo "======= test case end =======\n";
}