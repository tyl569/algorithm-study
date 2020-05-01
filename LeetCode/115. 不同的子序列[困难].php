<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    private $result = 0;
    private $memo = [];

    function numDistinct($s, $t)
    {
        $this->memo = array_fill(0, strlen($s), false);
        $this->helper($s, $t, $s, 0);
        return $this->result;
    }

    function helper($s, $t, &$str, $start)
    {
        if (str_replace("#", "", $str) == $t) {
            $this->result++;
            return;
        }
        if (strlen($str) <= strlen($t)) {
            return;
        }
        for ($i = $start; $i < strlen($s); $i++) {
            if ($this->memo[$i] == true) {
                continue;
            }
            $tmp = $str{$i};
            $str{$i} = "#";
            $this->helper($s, $t, $str, $i + 1);
            $str{$i} = $tmp;
            $this->memo[$i] = false;
        }
    }

    // 动态规划方程

    /**
     * @param $s
     * @param $t
     * @return int
     *
     * 动态规划方程
     * $s{$j} == $t{$i} :
     *
     * $dp[$i][$j] = $dp[$i-1][$j-1] + $dp[$i][$j-1]
     *
     * $s{$j} != $t{$i} :
     *
     * $dp[$i][$j] =  $dp[$i][$j-1]
     */
    function numDistinct_2($s, $t)
    {
        $dp = [];
        for ($j = 0; $j <= strlen($s); $j++) {
            $dp[0][$j] = 1;
        }
        for ($i = 1; $i <= strlen($t); $i++) {
            $dp[$i][0] = 0;
        }

        for ($i = 1; $i <= strlen($t); $i++) {
            for ($j = 1; $j <= strlen($s); $j++) {
                if ($s{$j - 1} == $t{$i - 1}) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + $dp[$i][$j - 1];
                } else {
                    $dp[$i][$j] = $dp[$i][$j - 1];
                }
            }
        }

        return $dp[strlen($t)][strlen($s)];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->numDistinct("rabbbit", "rabbit") . "\n";
    echo (new Solution())->numDistinct("babgbag", "bag") . "\n";
    echo (new Solution())->numDistinct_2("rabbbit", "rabbit") . "\n";
    echo (new Solution())->numDistinct_2("babgbag", "bag") . "\n";
    echo "======= test case end =======\n";
}