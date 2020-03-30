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
        sort($arr);
        $used = array_fill(0, count($arr), false);
        $this->helper($arr, [], $used);
        return $this->result;
    }

    function helper($arr, $list, $used)
    {
        if (count($arr) == count($list)) {
            $this->result[] = implode("", $list);
        }
        for ($i = 0; $i < count($arr); $i++) {
            if ($used[$i]) {
                continue;
            }
            if ($i > 0 && $used[$i - 1] && $arr[$i] == $arr[$i - 1]) {
                continue;
            }
            $list[] = $arr[$i];
            $used[$i] = true;
            $this->helper($arr, $list, $used);
            $used[$i] = false;
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->permutation("qqe"));
    echo "======= test case end =======\n";
}