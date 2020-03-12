<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k)
    {
        $arr = [];
        for ($i = 0; $i <= count($nums) - $k; $i++) {
            $tmp = array_slice($nums, $i, $k);
            $arr[] = max($tmp);
        }
        return $arr;
    }

    function maxSlidingWindow2($nums, $k)
    {
        $res = [];
        $windows = [];
        for ($i = 0; $i < count($nums); $i++) {
            if ($windows[0] + $k <= $i) {
                array_shift($windows);
            }
            while (!empty($windows) && $nums[$i] >= $nums[end($windows)]) {
                array_pop($windows);
            }
            $windows[] = $i;

            if ($i >= $k - 1) {
                $res[] = $nums[$windows[0]];
            }
        }
        return $res;
    }
}

$ret = (new Solution())->maxSlidingWindow([1, 3, -1, -3, 5, 3, 6, 7], 3);
var_dump($ret);

$ret = (new Solution())->maxSlidingWindow2([1, 3, -1, -3, 5, 3, 6, 7], 3);
var_dump($ret);