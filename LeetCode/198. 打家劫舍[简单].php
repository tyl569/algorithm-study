<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        return $this->helper(0, $nums);
    }

    function helper($start, $nums)
    {
        if ($start >= count($nums)) {
            return 0;
        }
        $money = max(
            $this->helper($start + 1, $nums), // 不抢这一家，去下一家
            $nums[$start] + $this->helper($start + 2, $nums) // 抢这一家和下下一家
        );
        return $money;
    }

    function rob_2($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        for ($i = 0; $i < count($nums); $i++) {
            $nums[$i] = max($nums[$i] + ($nums[$i - 2] ?? 0), $nums[$i - 1]);
        }
        return $nums[count($nums) - 1];
    }

    function rob_3($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        $dp_i = 0;
        $dp_i_2 = 0;
        $dp_i_1 = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $dp_i = max($nums[$i] + $dp_i_2 ?? 0, $dp_i_1);
            $dp_i_2 = $dp_i_1;
            $dp_i_1 = $dp_i;
        }
        return $dp_i;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->rob([1, 2, 3, 1]) . "\n";
    echo (new Solution())->rob([2, 7, 9, 3, 1]) . "\n";
    echo (new Solution())->rob([0]) . "\n";

    echo (new Solution())->rob_2([1, 2, 3, 1]) . "\n";
    echo (new Solution())->rob_2([2, 7, 9, 3, 1]) . "\n";
    echo (new Solution())->rob_2([0]) . "\n";

    echo (new Solution())->rob_3([1, 2, 3, 1]) . "\n";
    echo (new Solution())->rob_3([2, 7, 9, 3, 1]) . "\n";
    echo (new Solution())->rob_3([0]) . "\n";
    echo "======= test case end =======\n";
}