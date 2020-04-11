<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp = [];
        $maxK = 2;
        for ($i = 0; $i < count($prices); $i++) {
            for ($k = $maxK; $k >= 1; $k--) {
                if ($i == 0) {
                    $dp[$i][$k][0] = 0;
                    $dp[$i][$k][1] = -$prices[$i];
                    continue;
                }
                $dp[$i][$k][0] = max($dp[$i - 1][$k][0], $dp[$i - 1][$k][1] + $prices[$i]);
                $dp[$i][$k][1] = max($dp[$i - 1][$k][1], $dp[$i - 1][$k - 1][0] - $prices[$i]);
            }
        }
        return $dp[count($prices) - 1][$maxK][0];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([3, 3, 5, 0, 0, 3, 1, 4]) . "\n";
    echo (new Solution())->maxProfit([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit([7, 6, 4, 3, 1]) . "\n";
    echo "======= test case end =======\n";
}