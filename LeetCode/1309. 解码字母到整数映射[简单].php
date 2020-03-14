<?php

class Solution
{

    static $map = [
        1 => "a",
        2 => "b",
        3 => "c",
        4 => "d",
        5 => "e",
        6 => "f",
        7 => "g",
        8 => "h",
        9 => "i",
        "10#" => "j",
        "11#" => "k",
        "12#" => "l",
        "13#" => "m",
        "14#" => "n",
        "15#" => "o",
        "16#" => "p",
        "17#" => "q",
        "18#" => "r",
        "19#" => "s",
        "20#" => "t",
        "21#" => "u",
        "22#" => "v",
        "23#" => "w",
        "24#" => "x",
        "25#" => "y",
        "26#" => "z",
    ];

    /**
     * @param String $s
     * @return String
     */
    function freqAlphabets($s)
    {
        $i = 0;
        $res = "";
        while ($i < strlen($s)) {
            if ($s{$i + 2} == "#") {
                $res .= self::$map[$s{$i} . $s{$i + 1} . $s{$i + 2}];
                $i = $i + 3;
            } else {
                $res .= self::$map[$s{$i}];
                $i++;
            }
        }
        return $res;
    }
}

echo (new Solution())->freqAlphabets("12");
echo "\n";
echo (new Solution())->freqAlphabets("10#11#12");