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
        for ($i = 0; $i < count($prices); $i++) {
            if ($i == 0) {
                $dp[0][0] = 0;
                $dp[0][1] = -$prices[0];
                continue;
            }
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], -$prices[$i]);


        }
        return $dp[count($prices) - 1][0];
    }

    function maxProfit_2($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < count($prices); $i++) {
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, -$prices[$i]);
        }
        return $dp_i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([7, 1, 5, 3, 6, 4]) . "\n";
    echo (new Solution())->maxProfit_2([7, 1, 5, 3, 6, 4]) . "\n";
    echo "======= test case end =======\n";
}