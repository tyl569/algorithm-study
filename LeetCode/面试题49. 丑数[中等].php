<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        $a = 0;
        $b = 0;
        $c = 0;
        $dp[0] = 1;
        for ($i = 1; $i < $n; $i++) {
            $n2 = $dp[$a] * 2;
            $n3 = $dp[$b] * 3;
            $n5 = $dp[$c] * 5;


            $dp[$i] = min($n2, $n3, $n5);
            if ($dp[$i] == $n2) {
                $a++;
            }
            if ($dp[$i] == $n3) {
                $b++;
            }
            if ($dp[$i] == $n5) {
                $c++;
            }

        }
        return $dp[$n - 1];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->nthUglyNumber(10) . "\n";

    echo "======= test case end =======\n";
}