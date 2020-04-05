<?php

class Solution
{

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills)
    {
        $ten = 0;
        $five = 0;
        $i = 0;
        while ($i < count($bills)) {
            if ($bills[$i] == 10) {
                $five--;
                $ten++;
            }
            if ($bills[$i] == 20) {
                if ($ten > 0) {
                    $ten--;
                    $five--;
                } else {
                    $five -= 3;
                }
            }
            if ($bills[$i] == 5) {
                $five++;
            }
            if ($ten < 0 || $five < 0) {
                return false;
            }
            $i++;
        }
        return true;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $ret = (new Solution())->lemonadeChange([5, 5, 5, 10, 20]);
    var_dump($ret);
    $ret = (new Solution())->lemonadeChange([5, 5, 10]);
    var_dump($ret);
    $ret = (new Solution())->lemonadeChange([10, 10]);
    var_dump($ret);
    $ret = (new Solution())->lemonadeChange([5, 5, 10, 10, 20]);
    var_dump($ret);
    echo "======= test case end =======\n";
}