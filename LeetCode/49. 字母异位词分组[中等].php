<?php

class Solution
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs)
    {
        $map = [];
        foreach ($strs as $str) {
            $arr = str_split($str);
            sort($arr);
            $tem_str = implode("", $arr);
            $map[$tem_str][] = $str;
        }
        return $map;
    }

    function groupAnagrams_2($strs)
    {
        $resArr = [];
        $prime = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103];
        foreach ($strs as $str) {
            $val = 1;
            for ($i = 0; $i < strlen($str); $i++) {
                $val *= $prime[ord($str{$i})-97];
            }
            $resArr[$val][] = $str;
        }
        return  array_values($resArr);
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $arr = ["eat", "tea", "tan", "ate", "nat", "bat"];
    var_dump((new Solution())->groupAnagrams_2($arr));
    $arr = ["c", "c"];
    var_dump((new Solution())->groupAnagrams($arr));
    echo "======= test case end =======\n";
}