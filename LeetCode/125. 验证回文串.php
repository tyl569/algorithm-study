<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        if (empty($s) || strlen($s) == 1) {
            return true;
        }
        $s = strtolower($s);
        $i = 0;
        $j = strlen($s) - 1;
        while ($i < $j) {
            if (!preg_match("/^[a-z0-9]/", $s{$i})) {
                $i++;
                continue;
            }
            if (!preg_match("/^[a-z0-9]/", $s{$j})) {
                $j--;
                continue;
            }
            if ($s{$i} != $s{$j}) {
                return false;
            }
            $i++;
            $j--;
        }
        return true;
    }
}

if ((new Solution())->isPalindrome("A man, a plan, a canal: Panama")) {
    echo "是回文\n";
} else {
    echo "不是回文\n";
}

if ((new Solution())->isPalindrome("race a car")) {
    echo "是回文\n";
} else {
    echo "不是回文\n";
}