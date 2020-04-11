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
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 2][0] - $prices[$i]);
        }
        return $dp[count($prices) - 1][0];
    }

    function maxProfit_2($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        $i_0 = 0;
        $i_1 = PHP_INT_MIN;
        $i_2 = 0;
        for ($i = 0; $i < count($prices); $i++) {
            $tmp = $i_0;
            $i_0 = max($i_0, $i_1 + $prices[$i]);
            $i_1 = max($i_1, $i_2 - $prices[$i]);
            $i_2 = $tmp;
        }
        return $i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([1, 2, 3, 0, 2]) . "\n";
    echo (new Solution())->maxProfit_2([1, 2, 3, 0, 2]) . "\n";
    echo "======= test case end =======\n";
}