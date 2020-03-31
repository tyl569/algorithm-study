<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result = [];

    function subsets($nums)
    {
        for ($i = 0; $i <= count($nums); $i++) {
            $this->helper($nums, $i, 0, []);
        }
        return $this->result;
    }

    function helper($nums, $i, $start, $list)
    {
        if (count($list) == $i) {
            $this->result[] = $list;
            return;
        }
        for ($j = $start; $j < count($nums); $j++) {
            $list[] = $nums[$j];
            $this->helper($nums, $i, $j + 1, $list);
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->subsets([1, 2, 3]));
    echo "======= test case end =======\n";
}