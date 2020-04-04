<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $arr = [];
        for ($i = 0; $i < count($nums); $i++) {
            $diff = $target - $nums[$i];
            $arr[$diff] = $i;
            if (isset($arr[$nums[$i]])) {
                return [$i, $arr[$nums[$i]]];
            }
        }
        return [];
    }
}

$ret = (new Solution())->twoSum([2, 7, 11, 15], 9);
var_dump($ret);

$ret = (new Solution())->twoSum([1, 4, 5, 7], 9);
var_dump($ret);