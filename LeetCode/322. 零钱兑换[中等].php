<?php

class Solution
{

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount)
    {
        $dp[0] = 0;
        for ($i = 1; $i <= $amount; $i++) {
            $dp[$i] = $amount + 1;
        }
        for ($i = 1; $i <= $amount; $i++) {
            for ($j = 0; $j < count($coins); $j++) {
                if ($coins[$j] <= $i) {
                    $dp[$i] = min($dp[$i], $dp[$i - $coins[$j]] + 1);
                }

            }

        }
        return $dp[$amount] > $amount ? -1 : $dp[$amount];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->coinChange([1, 2, 5], 11) . "\n";
    echo (new Solution())->coinChange([1, 2, 5], 10) . "\n";
    echo (new Solution())->coinChange([2, 5, 10, 1], 27) . "\n";
    echo "======= test case end =======\n";
}