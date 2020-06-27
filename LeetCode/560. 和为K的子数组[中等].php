<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k)
    {
        $count = 0;
        for ($i = 0; $i < count($nums); $i++) {
            $sum = $nums[$i];
            if ($sum == $k) {
                $count++;
            }
            for ($j = $i + 1; $j < count($nums); $j++) {
                $sum += $nums[$j];
                if ($sum == $k) {
                    $count++;
                }
            }
        }
        return $count;
    }

    function subarraySum_2($nums, $k)
    {
        $n = count($nums);
        $ans = 0;
        $hash = [];
        $hash[0] = 1;
        $preSum = 0;
        for ($i = 0; $i < $n; $i++) {
            $preSum += $nums[$i];//前缀和
            $diff = $preSum - $k;
            if (isset($hash[$diff])) {
                $ans += $hash[$diff];
            }
            if (isset($hash[$preSum])) {
                $hash[$preSum]++;
            } else {
                $hash[$preSum] = 1;
            }
        }
        return $ans;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
//    echo (new Solution())->subarraySum([1, 1, 1], 2) . "\n";
//    echo (new Solution())->subarraySum([1, 2, 3], 3) . "\n";
    echo (new Solution())->subarraySum_2([1, 1, 1], 2) . "\n";
    echo (new Solution())->subarraySum_2([1, 2, 3], 3) . "\n";

    echo "======= test case end =======\n";
}