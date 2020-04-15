<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t)
    {
        $start = $left = 0;
        $right = 0;
        $target = [];
        $windows = [];
        $match = 0;
        $minLen = PHP_INT_MAX;

        for ($i = 0; $i < strlen($t); $i++) {
            $target[$t{$i}] = isset($target[$t[$i]]) ? $target[$t[$i]] + 1 : 1;
        }

        while ($right < strlen($s)) {
            $char = $s{$right};
            if ($target[$char]) {
                $windows[$char] = isset($windows[$char]) ? $windows[$char] + 1 : 1;
                if ($windows[$char] == $target[$char]) { // 查看个数是不是匹配
                    $match++;
                }
            }
            $right++; // 继续右移
            while ($match == count($target)) {
                if ($right - $left < $minLen) {
                    $start = $left;
                    $minLen = $right - $left;
                }
                $char2 = $s{$left};
                if ($target[$char2]) {
                    $windows[$char2]--;
                    if ($windows[$char2] < $target[$char2]) {
                        $match--;
                    }
                }
                $left++;

            }

        }
        return $minLen == PHP_INT_MAX ? "" : substr($s, $start, $minLen);
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->minWindow("ADOBECODEBANC", "ABC") . "\n";
    echo "======= test case end =======\n";
}