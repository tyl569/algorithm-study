<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $n = strlen($s);
        $dp = [];
        $res = "";
        for ($l = 0; $l < $n; $l++) { // 回文的长度
            for ($i = 0; $i < $n - 1; $i++) { // 回文的起始位置
                $j = $i + $l;
                if ($l == 0) {
                    $dp[$i][$j] = true;
                } elseif ($l == 1) {
                    $dp[$i][$j] = ($s{$i} == $s{$j});
                } else {
                    $dp[$i][$j] = ($s{$i} == $s{$j} && $dp[$i + 1][$j - 1]);
                }
                if ($dp[$i][$j] && $l + 1 > strlen($res)) {
                    $res = substr($s, $i, $l + 1);
                }
            }
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->longestPalindrome("babad") . "\n";
    echo "======= test case end =======\n";
}