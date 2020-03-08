<?php

class Solution
{

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $digits[count($digits) - 1] += 1;
        for ($i = count($digits) - 1; $i > 0; $i--) {
            if ($digits[$i] == 10) {
                $digits[$i - 1] += 1;
                $digits[$i] = 0;
            }

        }
        if ($digits[0] == 10) {
            $digits[0] = 1;
            $digits[] = 0;
        }
        return $digits;
    }
}

$arr = [1, 2, 3];
$ret = (new Solution())->plusOne($arr);
var_dump($ret);
$arr = [9, 9, 9];
$ret = (new Solution())->plusOne($arr);
var_dump($ret);
$arr = [1, 9, 9];
$ret = (new Solution())->plusOne($arr);
var_dump($ret);
$arr = [0, 0, 9];
$ret = (new Solution())->plusOne($arr);
var_dump($ret);