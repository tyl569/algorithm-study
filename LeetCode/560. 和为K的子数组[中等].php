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
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->subarraySum([1, 1, 1], 2) . "\n";
    echo (new Solution())->subarraySum([1, 2, 3], 3) . "\n";


    echo "======= test case end =======\n";
}