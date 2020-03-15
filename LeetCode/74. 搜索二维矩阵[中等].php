<?php
class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        if ($matrix[count($matrix) - 1][count($matrix[0]) - 1] < $target) {
            return false;
        }
        for ($i = 0; $i < count($matrix); $i++) {
            $j = count($matrix[0]) - 1;
            if ($matrix[$i][$j] == $target) {
                return true;
            }
            if ($matrix[$i][$j] < $target) {
                continue;
            }
            while ($j >= 0) {
                if ($matrix[$i][$j] == $target) {
                    return true;
                }
                $j--;
            }
        }
        return false;
    }
}

mock();

function mock()
{
    echo "========= test case start =========\n";

    $matrix = [
        [1, 3, 5, 7],
        [10, 11, 16, 20],
        [23, 30, 34, 50]
    ];
    $num = 11;
    $ret = (new Solution())->searchMatrix($matrix, $num);
    var_dump($ret);
    $num = 22;
    $ret = (new Solution())->searchMatrix($matrix, $num);
    var_dump($ret);
    echo "========= test case end =========\n";
}