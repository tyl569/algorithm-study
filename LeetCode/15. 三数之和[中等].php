<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        sort($nums);
        $arr = [];
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] > 0) {
                break;
            }
            if ($i > 0 && $nums[$i - 1] == $nums[$i]) {
                continue;
            }
            $m = $i + 1;
            $n = $len - 1;
            while ($m < $n) {
                $sum = $nums[$i] + $nums[$m] + $nums[$n];

                if ($sum > 0) {
                    $n--;
                } else if ($sum < 0) {
                    $m++;
                } else if ($sum == 0) {
                    $arr[] = [
                        $nums[$i], $nums[$m], $nums[$n]
                    ];
                    while ($m < $n && $nums[$m] == $nums[$m + 1]) {
                        $m++;
                    }
                    while ($m < $n && $nums[$n] == $nums[$n - 1]) {
                        $n--;
                    }
                    $m++;
                    $n--;

                }
            }
        }
        return $arr;
    }
}

$ret = (new Solution())->threeSum([-1, 0, 1, 2, -1, -4]);
var_dump($ret);

$ret = (new Solution())->threeSum([0, 0, 0]);
var_dump($ret);


$ret = (new Solution())->threeSum([-1, 0, 1, 0]);
var_dump($ret);

$ret = (new Solution())->threeSum([-2, 0, 0, 2, 2]);
var_dump($ret);