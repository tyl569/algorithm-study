<?php

class Solution
{

    /**
     * @param String $s
     * @return String[]
     */
    private $result = [];

    function permutation($s)
    {
        if (empty($s)) {
            return [];
        }
        $strArr = str_split($s);
        sort($strArr);
        $this->helper($strArr, [], array_fill(0, count($strArr), false));
        return $this->result;
    }

    function helper($strArr, $list, $used)
    {
        if (count($strArr) == count($list)) {
            $this->result[] = implode("", $list);
            return;
        }
        for ($i = 0; $i < count($strArr); $i++) {
            if ($used[$i]) {
                continue;
            }
            if ($i>0 && $strArr[$i] == $strArr[$i-1] && $used[$i-1]) {
                continue;
            }

            $char = $strArr[$i];

            $list[] = $char;
            $used[$i] = true;
            $this->helper($strArr, $list, $used);
            $used[$i] = false;
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->permutation("abc"));
    var_dump((new Solution())->permutation("aab"));
    echo "======= test case end =======\n";
}