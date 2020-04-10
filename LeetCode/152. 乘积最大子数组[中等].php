<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums)
    {
        $imin = 1;
        $imax = 1;
        $max = PHP_INT_MIN;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] < 0) {
                $tmp = $imax;
                $imax = $imin;
                $imin = $tmp;
            }
            $imax = max($nums[$i], $imax * $nums[$i]);
            $imin = min($nums[$i], $imin * $nums[$i]);
            $max = max($max, $imax);
        }
        return $max;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProduct([2, 3, -2, 4]) . "\n";
    echo (new Solution())->maxProduct([2, 10, -2, -1]) . "\n";
    echo "======= test case end =======\n";
}