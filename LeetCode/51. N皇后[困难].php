<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[][]
     */
    private $trace = [];

    function solveNQueens($n)
    {
        $matrix = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $matrix[$i][$j] = ".";
            }
        }
        $this->helper($matrix, 0, $n);
        foreach ($this->trace as &$trace) {
            for ($i = 0; $i < $n; $i++) {
                $trace[$i] = implode("", $trace[$i]);
            }
        }
        return $this->trace;
    }

    function helper(&$matrix, $row, $n)
    {
        if ($row == $n) {
            $this->trace[] = $matrix;
            return;
        }
        for ($j = 0; $j < $n; $j++) {
            if (!$this->valid($matrix, $row, $j)) {
                continue;
            }
            $matrix[$row][$j] = "Q";
            $this->helper($matrix, $row + 1, $n);
            $matrix[$row][$j] = ".";

        }
    }

    function valid($matrix, $row, $col)
    {

        for ($i = 0; $i < count($matrix); $i++) {
            if ($matrix[$i][$col] == "Q") {
                return false;
            }
        }
        for ($j = 0; $j < count($matrix[0]); $j++) {
            if ($matrix[$row][$j] == "Q") {
                return false;
            }
        }

        $i = $row - 1;
        $j = $col + 1;
        while ($i >= 0 && $j < count($matrix)) {
            if ($matrix[$i][$j] == "Q") {
                return false;
            }
            $i--;
            $j++;
        }

        $i = $row - 1;
        $j = $col - 1;
        while ($i >= 0 && $j >= 0) {
            if ($matrix[$i][$j] == "Q") {
                return false;
            }
            $i--;
            $j--;
        }
        return true;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    var_dump((new Solution())->solveNQueens(4));
    echo "======= test case end =======\n";
}

