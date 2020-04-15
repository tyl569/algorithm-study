<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s)
    {
        // 中心扩张
        $len = strlen($s);
        $ans = 0;
        for ($i = 0; $i < $len * 2; $i++) {
            $left = intval($i / 2);
            $right = $left + $i % 2;
            while ($s{$left} == $s{$right} && $left >= 0 && $right < $len) {
                $left--;
                $right++;
                $ans++;
            }
        }
        return $ans;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->countSubstrings("aaa") . "\n";
    echo (new Solution())->countSubstrings("abc") . "\n";
    echo "======= test case end =======\n";
}