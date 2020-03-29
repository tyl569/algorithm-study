<?php

class Solution
{

    /**
     * @param String $digits
     * @return String[]
     */
    private $map = [
        2 => ['a', 'b', 'c'],
        3 => ['d', 'e', 'f'],
        4 => ['g', 'h', 'i'],
        5 => ['j', 'k', 'l'],
        6 => ['m', 'n', 'o'],
        7 => ['p', 'q', 'r', 's'],
        8 => ['t', 'u', 'v'],
        9 => ['w', 'x', 'y', 'z'],
    ];

    public $result = [];


    function letterCombinations($digits)
    {
        if (empty($digits)) {
            return [];
        }
        $this->helper([], $digits, 0);

        return $this->result;
    }

    function helper($list, $digits, $start)
    {
        if (strlen($digits) == count($list)) {
            $this->result[] = implode("", $list);
            return;
        }
        for ($i = $start; $i < strlen($digits); $i++) {
            $num = $digits[$i];
            for ($j = 0; $j < count($this->map[$num]); $j++) {
                $chars = $this->map[$num][$j];
                $list[] = $chars;
                $this->helper($list, $digits, $i + 1);
                array_pop($list);
            }
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->letterCombinations("23"));
    echo "======= test case end =======\n";
}