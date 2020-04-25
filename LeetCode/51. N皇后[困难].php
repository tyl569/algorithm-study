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
        for ($i = 0; $i < $n; $i++) {
            $matrix[] = $default;
        }
        $this->helper($matrix, $n, 0);
        return $this->result;

    }

    function helper(&$matrix, $n, $row)
    {
        if ($n == $row) {
            $this->result[] = $matrix;
            return;
        }

        for ($j = 0; $j < strlen($matrix[$row]); $j++) {
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
        for ($i = 0; $i < $col; $i++) { // 检测当前列有没有皇后
            if ($matrix[$row]{$i} == "Q") {
                return false;
            }
        }
        for ($i = 0; $i < $row; $i++) { // 检测当前行有没有皇后
            if ($matrix[$i]{$col} == "Q") {
                return false;
            }
        }
        $i = $row - 1;
        $j = $col - 1;
        while ($i >= 0 && $j >= 0) {
            if ($matrix[$i]{$j} == "Q") { // 如果左上角有Q，返回false
                return false;
            }
            $i--;
            $j--;
        }

        $i = $row - 1;
        $j = $col + 1;
        while ($i >= 0 && $j <= strlen($matrix[$row]) - 1) { // 如果右上角有Q，返回false
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
    echo "======= test case start =======\n";

    var_dump((new Solution())->solveNQueens(4));
    echo "======= test case end =======\n";
}

