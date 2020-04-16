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
        if (count($nums) == 1) {
            return $nums[0];
        }

        return max(
            $this->helper(1, $nums, count($nums)), // 从第二个房子开始抢，一直到最后一间房子
            $this->helper(0, $nums, count($nums) - 1) // 从第一间房子开始抢，一直到倒数第二间房子
        );
    }

    function helper($start, $nums, $end)
    {
        if ($start >= $end) {
            return 0;
        }
        $res = max(
            $this->helper($start + 1, $nums, $end),
            $nums[$start] + $this->helper($start + 2, $nums, $end)
        );
        return $res;
    }

    function rob_2($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        if (count($nums) == 1) {
            return $nums[0];
        }

        return max(
            $this->dp(1, $nums, count($nums) - 1), // 从第二个房子开始抢，一直到最后一间房子
            $this->dp(0, $nums, count($nums) - 2) // 从第一间房子开始抢，一直到倒数第二间房子
        );
    }

    function dp($start, $nums, $end)
    {
        $dp_i = 0;
        $dp_i_1 = 0;
        $dp_i_2 = 0;
        for ($i = $start; $i <= $end; $i++) {
            $dp_i = max($dp_i_1, $dp_i_2 + $nums[$i]);
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
    echo (new Solution())->rob([2, 3, 2]) . "\n";
    echo (new Solution())->rob([1, 2, 3, 1]) . "\n";

    echo (new Solution())->rob_2([2, 3, 2]) . "\n";
    echo (new Solution())->rob_2([1, 2, 3, 1]) . "\n";
    echo "======= test case end =======\n";
}