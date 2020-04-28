<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */

    function lengthOfLIS($nums)
    {
        $dp = array_fill(0, count($nums), 1);
        for ($i = 0; $i < count($nums); $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    $dp[$i] = max($dp[$i], $dp[$j] + 1);
                }
            }
        }
        $res = 0;
        for ($i=0; $i<count($dp); $i++) {
            $res = max($res, $dp[$i]);
        }
        return $res;
    }

}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->lengthOfLIS([10, 9, 2, 5, 3, 7, 18, 101]) . "\n";
    echo (new Solution())->lengthOfLIS([10, 9, 2, 5, 3, 7, 101, 18]) . "\n";
    echo "======= test case end =======\n";
}