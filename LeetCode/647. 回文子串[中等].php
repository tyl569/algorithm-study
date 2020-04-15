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

    function countSubstrings_2($s)
    {
        $len = strlen($s);
        $rebuild[0] = "@";
        $rebuild[1] = "#";

        $i = 2;
        $arr = str_split($s);
        // 组装成 @#a#b#c#$
        foreach ($arr as $char) {
            $rebuild[$i++] = $char;
            $rebuild[$i++] = "#";
        }
        $rebuild[2 * $len + 2] = "$";
        $center = 0;
        $right = 0;
        $max = [];
        for ($i = 1; $i < count($rebuild); $i++) {
            if ($i < $right) {
                $max[$i] = min($right - $i, $max[2 * $center - $i]);
            }
            while ($rebuild[$i + $max[$i] + 1] == $rebuild[$i - $max[$i] - 1]) {
                $max[$i]++;
            }
            if ($i + $max[$i] > $right) {
                $center = $i;
                $right = $i + $max[$i];
            }
        }
        $count = 0;
        foreach ($max as $m) {
            $count += intval(($m + 1) / 2);
        }
        return $count;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->countSubstrings("aaa") . "\n";
    echo (new Solution())->countSubstrings_2("abc") . "\n";
    echo (new Solution())->countSubstrings_2("aaa") . "\n";
    echo "======= test case end =======\n";
}