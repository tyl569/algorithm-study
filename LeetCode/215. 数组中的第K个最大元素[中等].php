<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        $n = count($nums);
        $heap = new SplMinHeap();
        for ($i = 0; $i < $n; $i++) {
            if ($heap->count() < $k) {
                $heap->insert($nums[$i]);
            } elseif ($heap->top() < $nums[$i]) {
                $heap->extract();
                $heap->insert($nums[$i]);
            }
        }
        return $heap->top();
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->findKthLargest([3, 2, 1, 5, 6, 4], 2) . "\n";

    echo "======= test case end =======\n";
}