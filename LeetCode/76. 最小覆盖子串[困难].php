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
            $char1 = $s{$right};
            if ($target[$char1]) {
                $windows[$char1] = isset($windows[$char1]) ? $windows[$char1] + 1 : 1;
                if ($target[$char1] == $windows[$char1]) {
                    $match++;
                }
            }
            $right++;

            while ($match == count($target)) {
                if ($right - $left <= $minLen) {
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