<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $v = $nums[0];
        $len = 1;
        $count = count($nums);
        for ($j = 1; $j < $count; $j++) {
            if ($nums[$j] == $v) {
                unset($nums[$j]);
            } else {
                $v = $nums[$j];
                $len++;
            }
        }
        return $len;
    }
}

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];
echo (new Solution())->removeDuplicates($nums);
$nums = [1, 1, 2];
echo (new Solution())->removeDuplicates($nums);
