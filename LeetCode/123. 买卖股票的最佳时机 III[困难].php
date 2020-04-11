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
                    $dp[0][$k][0] = 0;
                    $dp[0][$k][1] = -$prices[$i];
                    continue;
                }
                $dp[$i][$k][0] = max($dp[$i - 1][$k][0], $dp[$i - 1][$k][1] + $prices[$i]);
                $dp[$i][$k][1] = max($dp[$i - 1][$k][1], $dp[$i - 1][$k - 1][0] - $prices[$i]);
            }
        }
        return $dp[count($prices) - 1][$maxK][0];
    }

    function maxProfit_2($prices)
    {
        if (empty($prices)) {
            return 0;
        }
        /**
         * $dp[$i][2][0] = max($dp[$i - 1][2][0], $dp[$i - 1][2][1] + $prices[$i]);
         * $dp[$i][2][1] = max($dp[$i - 1][2][1], $dp[$i - 1][1][0] - $prices[$i]);
         *
         * $dp[$i][1][0] = max($dp[$i - 1][1][0], $dp[$i - 1][1][1] + $prices[$i]);
         * $dp[$i][1][1] = max($dp[$i - 1][1][1], $dp[$i - 1][0][0] - $prices[$i]);
         *
         *
         */

        $dp_i00 = 0;
        $dp_i10 = 0;
        $dp_i20 = 0;
        $dp_i21 = PHP_INT_MIN;
        $dp_i11 = PHP_INT_MIN;

        for ($i = 0; $i < count($prices); $i++) {
            $dp_i20 = max($dp_i20, $dp_i21 + $prices[$i]);
            $dp_i21 = max($dp_i21, $dp_i10 - $prices[$i]);
            $dp_i10 = max($dp_i10, $dp_i11 + $prices[$i]);
            $dp_i11 = max($dp_i11, $dp_i00 - $prices[$i]);
        }
        return $dp_i20;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([3, 3, 5, 0, 0, 3, 1, 4]) . "\n";
    echo (new Solution())->maxProfit([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit([7, 6, 4, 3, 1]) . "\n";

    echo (new Solution())->maxProfit_2([3, 3, 5, 0, 0, 3, 1, 4]) . "\n";
    echo (new Solution())->maxProfit_2([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit_2([7, 6, 4, 3, 1]) . "\n";
    echo "======= test case end =======\n";
}