<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $arr = [];
        $str = "";
        $open = "";
        $close = "";
        $this->backtrack($arr, $open, $close, $n, $str);
        return $arr;
    }

    function backtrack(&$arr, $open, $close, $n, $str)
    {
        if (strlen($str) == 2 * $n) {
            $arr[] = $str;
            return;
        }
        if ($open < $n) {
            $this->backtrack($arr, $open + 1, $close, $n, $str . "(");
        }
        if ($close < $open) {
            $this->backtrack($arr, $open, $close + 1, $n, $str . ")");
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->generateParenthesis(1));
    var_dump((new Solution())->generateParenthesis(2));
    var_dump((new Solution())->generateParenthesis(3));
    var_dump((new Solution())->generateParenthesis(4));
    echo "======= test case end =======\n";
}

