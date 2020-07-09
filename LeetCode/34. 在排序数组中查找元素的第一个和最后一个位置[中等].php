<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        $res = [-1, -1];
        $leftIndex = $this->helper($nums, $target, true);

        if ($leftIndex == count($nums) || $nums[$leftIndex] != $target) {
            return $res;
        }
        $res[0] = $leftIndex;
        $res[1] = $this->helper($nums, $target, false) - 1;
        return $res;
    }

    function helper($nums, $target, $left)
    {
        $low = 0;
        $height = count($nums);

        while ($low < $height) {
            $mid = intval(($low + $height) / 2);
            if ($nums[$mid] > $target || ($left && $target == $nums[$mid])) {
                $height = $mid;
            } else {
                $low = $mid + 1;
            }
        }
        return $low;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $ret = (new Solution())->searchRange([5, 7, 7, 8, 8, 10], 8);
    var_dump($ret);
    echo "======= test case end =======\n";
}