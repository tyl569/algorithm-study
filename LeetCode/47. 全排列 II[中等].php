<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result = [];

    function permuteUnique($nums)
    {
        sort($nums);
        $this->helper($nums, [], [false, false, false]);
        return $this->result;
    }

    function helper($nums, $list, $used)
    {
        if (count($nums) == count($list)) {
            $this->result[] = $list;
            return;
        }

        for ($i = 0; $i < count($nums); $i++) {
            if ($used[$i]) {
                continue;
            }
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && $used[$i-1]) {
                continue;
            }
            $list[] = $nums[$i];
            $used[$i] = true;
            $this->helper($nums, $list, $used);
            array_pop($list);
            $used[$i] = false;
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->permuteUnique([1, 2, 1]));
    echo "======= test case end =======\n";
}