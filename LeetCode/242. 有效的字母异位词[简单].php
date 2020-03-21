<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t)
    {
        if (strlen($s) != strlen($t)) {
            return false;
        }
        $arr = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if (!isset($arr[$s{$i}])) {
                $arr[$s{$i}] = 0;
            }
            if (!isset($arr[$t{$i}])) {
                $arr[$t{$i}] = 0;
            }
            $arr[$s{$i}]++;
            $arr[$t{$i}]--;
        }
        foreach ($arr as $value) {
            if ($value > 0) {
                return false;
            }
        }
        return true;
    }

    // 字符太长容易计算出现溢出
    function isAnagram_1($s, $t)
    {
        if (strlen($s) != strlen($t)) {
            return false;
        }
        $prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
        $sLen = 1;
        $tLen = 1;
        for ($i = 0; $i < strlen($s); $i++) {
            $sLen *= $prime[ord($s{$i}) - 97];
            $tLen *= $prime[ord($t{$i}) - 97];
        }
        return $sLen == $tLen;
    }
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->isAnagram("anagram", "nagaram"));
    var_dump((new Solution())->isAnagram("rat", "car"));
    var_dump((new Solution())->isAnagram_1("anagram", "nagaram"));
    var_dump((new Solution())->isAnagram_1("rat", "car"));
    var_dump((new Solution())->isAnagram_1("a", "ab"));
    echo "======= test case end =======\n";
}