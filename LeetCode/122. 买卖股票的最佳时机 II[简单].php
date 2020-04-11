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

    function maxProfit_2($prices)
    {
        $db_i_0 = 0;
        $db_i_1 = PHP_INT_MIN;

        for ($i = 0; $i < count($prices); $i++) {
            $db_i_0 = max($db_i_0, $db_i_1+$prices[$i]);
            $db_i_1 = max($db_i_1, $db_i_0-$prices[$i]);

        }
        return $db_i_0;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxProfit([7, 1, 5, 3, 6, 4]) . "\n";
    echo (new Solution())->maxProfit([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit([7, 6, 5, 4, 3, 2, 1]) . "\n";

    echo (new Solution())->maxProfit_2([7, 1, 5, 3, 6, 4]) . "\n";
    echo (new Solution())->maxProfit_2([1, 2, 3, 4, 5]) . "\n";
    echo (new Solution())->maxProfit_2([7, 6, 5, 4, 3, 2, 1]) . "\n";

    echo "======= test case end =======\n";
}