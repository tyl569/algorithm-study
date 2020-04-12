<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    private $word1;
    private $word2;

    function minDistance($word1, $word2)
    {
        $this->word1 = $word1;
        $this->word2 = $word2;
        return $this->dp(strlen($word1) - 1, strlen($word2) - 1);
    }

    function dp($i, $j)
    {
        if ($i == -1) {
            return $j + 1;
        }
        if ($j == -1) {
            return $i + 1;
        }
        if ($this->word1{$i} == $this->word2{$j}) {
            return $this->dp($i - 1, $j - 1);
        } else {
            return min(
                $this->dp($i - 1, $j) + 1, // 删除一个元素
                $this->dp($i - 1, $j - 1) + 1, //替换一个元素
                $this->dp($i, $j - 1) + 1 // 新增了一个元素
            );
        }
    }

    function minDistance_2($word1, $word2)
    {
        $dp[0][0] = 0;
        $m = strlen($word1);
        $n = strlen($word2);
        for ($i = 1; $i <= $m; $i++) {
            $dp[$i][0] = $i;
        }
        for ($j = 1; $j <= $n; $j++) {
            $dp[0][$j] = $j;
        }
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($word1{$i - 1} == $word2{$j - 1}) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = min($dp[$i - 1][$j] + 1, $dp[$i - 1][$j - 1] + 1, $dp[$i][$j - 1] + 1);
                }
            }
        }
        return $dp[$m][$n];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->minDistance("horse", "ros") . "\n";
    echo (new Solution())->minDistance_2("horse", "ros") . "\n";
    echo "======= test case end =======\n";
}