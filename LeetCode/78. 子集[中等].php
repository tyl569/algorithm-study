<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $k = 0;
    private $result = [];

    function subsets($nums)
    {
        for ($this->k = 0; $this->k <= count($nums); $this->k++) {
            $this->helper(0, $nums, [], count($nums));
        }

        return $this->result;
    }

    function helper($first, $nums, $list, $n)
    {
        if (count($list) == $this->k) {
            $this->result[] = $list;
        }
        for ($i = $first; $i < $n; $i++) {
            $list[] = $nums[$i];
            $this->helper($i + 1, $nums, $list, $n);
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