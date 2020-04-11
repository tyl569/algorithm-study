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
        for ($i = 0; $i < count($nums); $i++) {
            $nums[$i] = max(($nums[$i - 1] ?? 0), ($nums[$i - 2] ?? 0) + $nums[$i]);
        }
        return $nums[count($nums) - 1];
    }

    function rob_2($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        $currentMax = $preMax = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $tmp = $currentMax;
            $currentMax = max($preMax + $nums[$i], $currentMax);
            $preMax = $tmp;

        }
        return $currentMax;
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
    echo "======= test case end =======\n";
}