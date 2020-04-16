<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    private $nums;

    function maxCoins($nums)
    {
        $this->nums = $nums;
        $maxCoin = $this->helper(0, count($nums) - 1);
        return $maxCoin;

    }

    function helper($start, $end)
    {
        $maxCoin = 0;
        for ($i = $start; $i <= $end; $i++) {
            $leftMax = $this->helper($start, $i - 1);
            $rightMax = $this->helper($i + 1, $end);
            $tmp = ($start - 1 < 0 ? 1 : $this->nums[$start - 1]) * $this->nums[$i] * ($end + 1 > count($this->nums) - 1 ? 1 : $this->nums[$end + 1]);
            $maxCoin = max($maxCoin, $tmp + $leftMax + $rightMax);
        }
        return $maxCoin;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxCoins([3, 1, 5, 8]) . "\n";
    echo "======= test case end =======\n";
}