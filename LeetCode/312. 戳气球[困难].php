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

    private $cache = [];

    function maxCoins_2($nums)
    {
        $this->nums = $nums;
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = 0; $j < count($nums); $j++) {
                $this->cache[$i][$j] = -1;
            }
        }
        $maxCoin = $this->helper_2(0, count($nums) - 1);
        return $maxCoin;

    }

    function helper_2($start, $end)
    {
        if ($start <= $end) {
            if ($this->cache[$start][$end] != -1) {
                return $this->cache[$start][$end];
            }
        }
        $maxCoin = 0;
        for ($i = $start; $i <= $end; $i++) {
            $leftMax = $this->helper_2($start, $i - 1);
            $rightMax = $this->helper_2($i + 1, $end);
            $tmp = ($start - 1 < 0 ? 1 : $this->nums[$start - 1]) * $this->nums[$i] * ($end + 1 > count($this->nums) - 1 ? 1 : $this->nums[$end + 1]);
            $maxCoin = max($maxCoin, $tmp + $leftMax + $rightMax);
        }
        if ($end >= $start) {
            $this->cache[$start][$end] = $maxCoin;
        }

        return $maxCoin;
    }

    function maxCoins_3($nums)
    {
        if (empty($nums)) {
            return 0;
        }
        $dp = [];
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = 0; $j < count($nums) - $i; $j++) {
                $this->dp($dp, $nums, $j, $j + $i);
            }
        }
        return $dp[0][count($nums) - 1];

    }

    function dp(&$dp, $nums, $start, $end)
    {
        $max = 0;
        for ($i = $start; $i <= $end; $i++) {
            $cur = ($start - 1 < 0 ? 1 : $nums[$start - 1]) * $nums[$i] * ($end + 1 > count($nums) - 1 ? 1 : $nums[$end + 1]);
            $leftMax = ($start > $i - 1 ? 0 : $dp[$start][$i - 1]);
            $rightMax = ($end < $i + 1 ? 0 : $dp[$i + 1][$end]);
            $max = max($max, $cur + $leftMax + $rightMax);
        }
        $dp[$start][$end] = $max;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->maxCoins([3, 1, 5, 8]) . "\n";
    echo (new Solution())->maxCoins_2([3, 1, 5, 8]) . "\n";
    echo (new Solution())->maxCoins_3([3, 1, 5, 8]) . "\n";
    echo "======= test case end =======\n";
}