<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $left = 0;
        $right = count($nums) - 1;
        $mid = intval($left + ($right - $left) / 2);
        while ($left <= $right) {
            if ($nums[$mid] == $target) {
                return $mid;
            }
            if ($nums[$mid] >= $nums[$left]) { // $mid左部分是【单调递增】，右部分是【非单调递增】
                // 如果$target落在【单调递增】的区间，缩小右边界；否则，缩小左边界
                if ($target >= $nums[$left] && $target <= $nums[$mid]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else { // $mid左部分是【非单调递增】，右部分是【单调递增】
                // 如果$target落在【单调递增】区间，缩小左边界，；否则缩小右边界
                if ($target >= $nums[$mid] && $target <= $nums[$right]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
            $mid = intval($left + ($right - $left) / 2);
        }
        return -1;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->search([4, 5, 6, 0, 1, 2], 0) . "\n";
    echo (new Solution())->search([4, 5, 6, 0, 1, 2], 3) . "\n";
    echo (new Solution())->search([5, 1, 3], 0) . "\n";
    echo "======= test case end =======\n";
}