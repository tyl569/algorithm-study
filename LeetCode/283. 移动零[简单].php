<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $j = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] != 0) {
                $nums[$j++] = $nums[$i];
            }
        }
        for ($i = $j; $i < count($nums); $i++) {
            $nums[$i] = 0;
        }
    }

    function moveZeroes2(&$nums)
    {
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] == 0) {
                unset($nums[$i]);// 直接unset 代价比较高
            }
        }
        for ($i = count($nums); $i < $len; $i++) {
            $nums[] = 0;
        }
    }
}

//
//$nums = [0, 1, 0, 3, 12];
//(new Solution())->moveZeroes($nums);
$nums = [0, 1, 0, 3, 12];
(new Solution())->moveZeroes2($nums);
var_dump($nums);

