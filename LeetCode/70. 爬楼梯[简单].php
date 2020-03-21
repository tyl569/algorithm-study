<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n == 1 || $n == 2) {
            return $n;
        }
        $num1 = 1;
        $num2 = 2;
        for ($i = 3; $i <= $n; $i++) {
            $tmp = $num2;
            $num2 = $num2 + $num1;
            $num1 = $tmp;
        }
        return $num2;
    }

    function climbStairs_2($n)
    {
        $base = [
            [1, 1],
            [1, 0]
        ];
        $ans = [
            [1, 0],
            [0, 1]
        ];
        while ($n) {
            if ($n & 1) {
                $ans = $this->multi($ans, $base);
            }
            $base = $this->multi($base, $base);
            $n >>= 1;
        }
        return $ans[0][0];
    }

    function multi($a, $b)
    {
        $c = [
            [0, 0],
            [0, 0]
        ];
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                for ($k = 0; $k < 2; $k++) {
                    $c[$i][$j] = $c[$i][$j] + $a[$i][$k] * $b[$k][$j];
                }
            }
        }
        return $c;
    }
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->climbStairs(3) . "\n";
    echo (new Solution())->climbStairs_2(3) . "\n";
    echo "======= test case end =======\n";
}