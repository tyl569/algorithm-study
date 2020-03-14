<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function minSlidingWindow($nums, $k)
    {
        $res = [];
        for ($i = 0; $i <= count($nums) - $k; $i++) {
            $res[] = min(array_slice($nums, $i, $k));
        }
        return $res;
    }

    function minSlidingWindow2($nums, $k)
    {
        $res = [];
        $windows = [];
        for ($i = 0; $i < count($nums); $i++) {
            if ($windows[0] + $k <= $i) {
                array_shift($windows);
            }

            while (!empty($windows) && $nums[end($windows)] >= $nums[$i]) {
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

function mock()
{
    echo "========= test case start =========\n";
    $ret1 = (new Solution())->minSlidingWindow([1, 3, -1, -3, 5, 3, 6, 7], 3);
    $ret2 = (new Solution())->minSlidingWindow2([1, 3, -1, -3, 5, 3, 6, 7], 3);
    if ($ret1 == $ret2) {
        echo "测试case通过.\n";
    }

    $ret1 = (new Solution())->minSlidingWindow([5, 3, 7, 0, -5, 3, 6, -7], 3);
    $ret2 = (new Solution())->minSlidingWindow2([5, 3, 7, 0, -5, 3, 6, -7], 3);
    if ($ret1 == $ret2) {
        echo "测试case通过.\n";
    }
    echo "========= test case end =========\n";
}