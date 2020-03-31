<?php

class Solution
{

    /**
     * @param String $S
     * @return String[]
     */
    private $result = [];

    function permutation($S)
    {
        $arr = str_split($S);
        $this->helper($arr, []);
        return $this->result;
    }

    function helper($arr, $list)
    {
        if (count($arr) == count($list)) {
            $this->result[] = implode("", $list);
            return;
        }
        for ($i = 0; $i < count($arr); $i++) {
            if (in_array($arr[$i], $list)) {
                continue;
            }
            $list[] = $arr[$i];
            $this->helper($arr, $list);
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->permutation("qwe"));
    echo "======= test case end =======\n";
}