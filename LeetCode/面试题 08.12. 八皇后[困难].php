<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[][]
     */
    private $result = [];

    function solveNQueens($n)
    {
        $matrix = [];
        for ($i = 0; $i < $n; $i++) {
            $matrix[$i] = array_fill(0, $n, ".");
        }
        $this->helper($matrix, $n, 0);
        foreach ($this->result as &$result) {
            for ($i = 0; $i < $n; $i++) {
                $result[$i] = implode("", $result[$i]);
            }
        }
        return $this->result;
    }

    function helper(&$matrix, $n, $row)
    {
        if ($row == $n) {
            $this->result[] = $matrix;
        }
        for ($j = 0; $j < $n; $j++) { // 按照列进行遍历
            if (!$this->invalid($matrix, $row, $j)) {
                continue;
            }
            $matrix[$row][$j] = "Q";
            $this->helper($matrix, $n, $row + 1);
            $matrix[$row][$j] = ".";
        }
    }

    function invalid($matrix, $row, $col)
    {
        // 检查当前这一列是否有皇后
        for ($i = 0; $i < count($matrix[0]); $i++) {
            if ($matrix[$i][$col] == "Q") {
                return false;
            }
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

        $i = $row - 1;
        $j = $col + 1;
        while ($i >= 0 && $j < count($matrix[0])) {
            if ($matrix[$i][$j] == "Q") {
                return false;
            }
            $i--;
            $j++;
        }
        return true;
    }
}

mock();

function mock()
{
    echo "====== test case start =======\n";
    var_dump((new Solution())->solveNQueens(4));


    echo "====== test case end =======\n";
}