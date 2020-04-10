<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $max = $nums[0];
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i - 1] > 0) {
                $nums[$i] += $nums[$i - 1];
            }
            $max = max($nums[$i], $max);
        }
        return $max;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxSubArray([-2, 1, -3, 4, -1, 2, 1, -5, 4]) . "\n";
    echo (new Solution())->maxSubArray([-2, 1]) . "\n";
    echo "======= test case end =======\n";
}