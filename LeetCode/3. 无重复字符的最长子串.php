<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        if (strlen($s) == 0) {
            return 0;
        }
        if (strlen($s) == 1) {
            return 1;
        }
        $len = 0;
        $left = 0;
        $right = 0;
        $strArr = [];
        $lenArr[$left] = 1;
        while ($left < strlen($s) && $right < strlen($s)) {
            if (!isset($strArr[$s{$right}])) {
                $strArr[$s{$right}] = $s{$right};
                $len = max(count($strArr), $len);
                $right++;
            } else {
                unset($strArr);
                $left++;
                $right = $left;
            }
        }
        return $len;
    }
}

echo (new Solution())->lengthOfLongestSubstring("abcabcbb");
echo "\n";
echo (new Solution())->lengthOfLongestSubstring("bbbbb");
echo "\n";
echo (new Solution())->lengthOfLongestSubstring("pwwkew");