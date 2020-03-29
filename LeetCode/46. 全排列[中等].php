<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result = [];

    function permute($nums)
    {
        $this->helper($nums, 0, []);
        return $this->result;
    }

    function helper($nums, $start, $list)
    {
        if (count($nums) == count($list)) {
            $this->result[] = $list;
            return;
        }
        for ($i = 0; $i < count($nums); $i++) {
            if (in_array($nums[$i], $list)) {
                continue;
            }
            $list[] = $nums[$i];
            $this->helper($nums, $start + 1, $list);
            array_pop($list);
        }

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $nums = [1, 2, 3];
    var_dump((new Solution())->permute($nums));
    echo "======= test case end =======\n";
}