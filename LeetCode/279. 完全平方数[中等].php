<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n)
    {
        $max = intval(sqrt($n)) + 1;
        for ($i = 1; $i < $max; $i++) {
            $square_nums[$i] = $i * $i;
        }
        $dp[0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            $dp[$i] = $n + 1;
        }
        for ($j = 1; $j <= $n; $j++) {
            for ($i = 1; $i < $max; $i++) {
                if ($square_nums[$i] <= $j) {
                    $dp[$j] = min($dp[$j], $dp[$j - $square_nums[$i]] + 1);
                }
            }
        }
        return $dp[$n];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->numSquares(12) . "\n";
    echo "======= test case end =======\n";
}