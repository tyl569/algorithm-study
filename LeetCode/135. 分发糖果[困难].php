<?php

class Solution
{

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings)
    {
        $count = 0;
        $left = $right = array_fill(0, count($ratings), 1);
        for ($i = 0; $i < count($ratings); $i++) {
            if ($i > 0 && $ratings[$i] > $ratings[$i - 1]) {
                $left[$i] = $left[$i - 1] + 1;
            }
        }
        for ($j = count($right) - 1; $j >= 0; $j--) {
            if ($j <= count($right) - 2 && $ratings[$j] > $ratings[$j + 1]) {
                $right[$j] = $right[$j + 1] + 1;
            }
            $count += max($right[$j], $left[$j]);
        }
        return $count;

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->candy([1, 0, 2]) . "\n";
    echo (new Solution())->candy([1, 2, 2]) . "\n";
    echo (new Solution())->candy([3, 1, 2, 0, 2, 4, 2]) . "\n";
    echo (new Solution())->candy([1, 3, 2, 2, 1]) . "\n";
    echo "======= test case end =======\n";
}