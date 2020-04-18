<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n == 0) {
            return 0;
        }
        if ($n == 1) {
            return 1;
        }
        if ($n == 2) {
            return 2;
        }
        return $this->climbStairs($n - 1) + $this->climbStairs($n - 2);
    }

    private $memo = [];

    function climbStairs_2($n)
    {
        if ($n == 0) {
            return 0;
        }
        if ($n == 1) {
            return 1;
        }
        if ($n == 2) {
            return 2;
        }
        $this->memo[0] = 0;
        $this->memo[1] = 1;
        $this->memo[2] = 2;
        if (!empty($this->memo[$n])) {
            return $this->memo[$n];
        }
        $this->memo[$n] = $this->climbStairs($n - 1) + $this->climbStairs($n - 2);
        return $this->memo[$n];
    }

    function climbStairs_3($n)
    {

        if ($n == 1) {
            return 1;
        }
        if ($n == 2) {
            return 2;
        }
        $num1 = 1;
        $num2 = 2;
        for ($i = 3; $i <= $n; $i++) {
            $tmp = $num2;
            $num2 += $num1;
            $num1 = $tmp;
        }
        return $num2;
    }
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->climbStairs(30) . "\n";
    echo (new Solution())->climbStairs_2(30) . "\n";
    echo (new Solution())->climbStairs_3(30) . "\n";
    echo "======= test case end =======\n";
}