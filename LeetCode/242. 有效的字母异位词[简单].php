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
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->isAnagram("anagram", "nagaram"));
    var_dump((new Solution())->isAnagram("rat", "car"));
    echo "======= test case end =======\n";
}