<?php

class Solution
{

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost)
    {
        // 动态方程 f[i] = min(f[i+1], f[i+2]);
        $f1 = 0;
        $f2 = 0;

        for ($i = count($cost) - 1; $i >= 0; $i--) {
            $f0 = $cost[$i] + min($f1, $f2);
            $f2 = $f1;
            $f1 = $f0;
        }
        return min($f1, $f2);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->minCostClimbingStairs([10, 15, 20]) . "\n";
    echo "======= test case end =======\n";
}