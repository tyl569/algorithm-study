<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function reversePairs($nums)
    {
        return $this->mergesort_and_count($nums, 0, count($nums) - 1);
    }

    function mergesort_and_count(&$nums, $start, $end)
    {
        if ($start < $end) {
            $mid = ($start + $end) >> 1;
            $count = $this->mergesort_and_count($nums, 0, $mid) + $this->mergesort_and_count($nums, $mid + 1, $end);
            $j = $mid + 1;
            for ($i = $start; $i <= $mid; $i++) {
                while ($j <= $end && $nums[$i] > $nums[$j] * 2) {
                    $j++;
                }
                $count += $j - ($mid + 1);
            }
            $this->merge($nums, $start, $mid, $end);
            return $count;
        } else {
            return 0;
        }
    }

    function merge(&$nums, $start, $mid, $end)
    {
        $n1 = ($mid - $start + 1);
        $n2 = ($end - $mid);
        for ($i = 0; $i < $n1; $i++) {
            $left[$i] = $nums[$start + $i];
        }
        for ($j = 0; $j < $n2; $j++) {
            $right[$j] = $nums[$mid + 1 + $j];
        }
        $i = 0;
        $j = 0;
        for ($k = $start; $k <= $end; $k++) {
            if ($j >= $n2 || ($i < $n1 && $left[$i] <= $right[$j])) {
                $nums[$k] = $left[$i++];
            } else {
                $nums[$k] = $right[$j++];
            }
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->reversePairs([1, 3, 2, 3, 1]) . "\n";
    echo (new Solution())->reversePairs([2, 4, 3, 5, 1]) . "\n";
    echo "======= test case end =======\n";
}