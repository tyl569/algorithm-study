<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    function maxProfit($prices, $fee)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp = [];
        for ($i = 0; $i < count($prices); $i++) {
            if ($i == 0) {
                $dp[$i][0] = 0;
                $dp[$i][1] = -$prices[0];
                continue;
            }
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i] - $fee);
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 1][0] - $prices[$i]);
        }
        return $dp[count($prices) - 1][0];
    }

    function maxProfit_2($prices, $fee)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < count($prices); $i++) {
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i] - $fee);
            $dp_i_1 = max($dp_i_1, $dp_i_0 - $prices[$i]);
        }
        return $dp_i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([1, 3, 2, 8, 4, 9], 2) . "\n";
    echo (new Solution())->maxProfit([9, 8, 7, 1, 2], 3) . "\n";

    echo (new Solution())->maxProfit_2([1, 3, 2, 8, 4, 9], 2) . "\n";
    echo (new Solution())->maxProfit_2([9, 8, 7, 1, 2], 3) . "\n";
    echo "======= test case end =======\n";
}