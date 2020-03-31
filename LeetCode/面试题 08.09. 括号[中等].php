<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    private $result = [];

    function generateParenthesis($n)
    {
        $this->helper($n, "", 0, 0);
        return $this->result;
    }

    function helper($n, $str, $open, $close)
    {
        if ($n * 2 == strlen($str)) {
            $this->result[] = $str;
        }
        if ($open < $n) {
            $this->helper($n, $str . "(", $open + 1, $close);
        }
        if ($close < $open) {
            $this->helper($n, $str . ")", $open, $close + 1);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->generateParenthesis(3));
    echo "======= test case end =======\n";
}