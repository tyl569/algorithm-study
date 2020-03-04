<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        if (empty($s)) {
            return true;
        }
        if (strlen($s) == 1) {
            return true;
        }
        $s = strtolower($s);
        $i = 0;
        $j = strlen($s) - 1;
        while ($i < $j) {
            $tmpI = $s{$i};
            $tmpJ = $s{$j};

            if (!preg_match("/^[a-z0-9]/", $tmpI)) {
                $i++;
                continue;
            }
            if (!preg_match("/^[a-z0-9]/", $tmpJ)) {
                $j--;
                continue;
            }
            if ($tmpI != $tmpJ) {
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