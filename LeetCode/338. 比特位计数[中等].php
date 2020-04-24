<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer[]
     */
    function countBits($num)
    {
        $res = [];
        for ($i = 0; $i <= $num; $i++) {
            $count = 0;
            $n = $i;
            while ($n != 0) {
                $count++;
                $n = $n & ($n - 1);
            }
            $res[$i] = $count;
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new  Solution())->countBits(2));
    var_dump((new  Solution())->countBits(5));
    echo "======= test case end =======\n";
}