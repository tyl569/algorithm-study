<?php

class Solution
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    private $result = [];

    function combinationSum($candidates, $target)
    {
        sort($candidates);
        $this->helper($candidates, $target, [], 0);
        return $this->result;
    }

    function helper($candidates, $target, $list, $start)
    {
        if (array_sum($list) == $target) {
            $this->result[] = $list;
            return;
        }
        for ($i = $start; $i < count($candidates); $i++) {
            if (array_sum($list) + $candidates[$i] > $target) {
                break;
            }
            $list[] = $candidates[$i];
            $this->helper($candidates, $target, $list, $i);
            array_pop($list);
        }
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->combinationSum([2], 1));
    var_dump((new Solution())->combinationSum([2, 3, 6, 7], 7));
    var_dump((new Solution())->combinationSum([2, 3, 5], 8));
    echo "======= test case end =======\n";
}