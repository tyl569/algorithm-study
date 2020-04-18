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
        $default = "";
        for ($i = 0; $i < $n; $i++) {
            $default .= ".";
        }
        $matrix = array_fill(0, $n, $default);
        $this->helper($matrix, $n, 0);
        return $this->result;
    }

    function helper(&$matrix, $n, $row)
    {
        if ($row == $n) {
            $this->result[] = $matrix;
            return;
        }
        for ($j = 0; $j < $n; $j++) {
            if (!$this->invalid($matrix, $row, $j)) {
                continue;
            }
            $matrix[$row]{$j} = "Q";
            $this->helper($matrix, $n, $row + 1);
            $matrix[$row]{$j} = ".";
        }

    }

    function invalid($matrix, $row, $col)
    {
        for ($i = 0; $i < count($matrix); $i++) {
            if ($matrix[$i]{$col} == "Q") {
                return false;
            }
        }
        $i = $row - 1;
        $j = $col - 1;
        while ($i >= 0 && $j >= 0) { // 从当前位置，向左上角检索
            if ($matrix[$i]{$j} == "Q") {
                return false;
            }
            $i--;
            $j--;
        }
        $i = $row - 1;
        $j = $col + 1;
        while ($i >= 0 && $j < count($matrix)) { // 从当前位置想右上角检索
            if ($matrix[$i]{$j} == "Q") {
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