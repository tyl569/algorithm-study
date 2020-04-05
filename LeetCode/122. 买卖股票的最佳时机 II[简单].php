<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $earn = 0;
        for ($i = 0; $i < count($prices); $i++) {
            if ($prices[$i] < $prices[$i + 1] && isset($prices[$i]) && isset($prices[$i + 1])) {
                $earn += $prices[$i + 1] - $prices[$i];
            }
        }
        return $earn;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([7, 1, 5, 3, 6, 4]) . "\n";
    echo (new Solution())->maxProfit([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit([7, 6, 5, 4, 3, 2, 1]) . "\n";

    echo "======= test case end =======\n";
}