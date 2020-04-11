<?php

class Solution
{

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices)
    {
        if (empty($k) || empty($prices)) {
            return 0;
        }
        $dp = [];
        if ($k > count($prices) / 2) {
            return $this->profit($prices);
        }
        for ($i = 0; $i < count($prices); $i++) {
            for ($j = $k; $j >= 1; $j--) {
                if ($i == 0) {
                    $dp[$i][$j][0] = 0;
                    $dp[$i][$j][1] = -$prices[0];
                    continue;
                }

                $dp[$i][$j][0] = max($dp[$i - 1][$j][0], $dp[$i - 1][$j][1] + $prices[$i]);
                $dp[$i][$j][1] = max($dp[$i - 1][$j][1], $dp[$i - 1][$j - 1][0] - $prices[$i]);

            }
        }
        return $dp[count($prices) - 1][$k][0];
    }

    function profit($prices)
    {
        $dp_i_0 = 0;
        $dp_i_1 = PHP_INT_MIN;
        for ($i = 0; $i < count($prices); $i++) {
            $dp_i_0 = max($dp_i_0, $dp_i_1 + $prices[$i]);
            $dp_i_1 = max($dp_i_1, $dp_i_0 - $prices[$i]);
        }
        return $dp_i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit(2, [2, 4, 1]) . "\n";
    echo (new Solution())->maxProfit(2, [3, 2, 6, 5, 0, 3]) . "\n";
    echo (new Solution())->maxProfit(2, [3, 3, 5, 0, 0, 3, 1, 4]) . "\n";
    echo (new Solution())->maxProfit(100, [3, 3, 5, 0, 0, 3, 1, 4]) . "\n";
    echo "======= test case end =======\n";
}