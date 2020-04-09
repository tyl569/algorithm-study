<?php

class Solution
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        for ($i = count($triangle) - 2; $i >= 0; $i--) {
            for ($j = 0; $j < count($triangle[$i]); $j++) {
                $triangle[$i][$j] += min($triangle[$i + 1][$j], $triangle[$i + 1][$j + 1]);
            }
        }
        return $triangle[0][0];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $triangle = [
        [2],
        [3, 4],
        [6, 5, 7],
        [4, 1, 8, 3],
    ];
    echo (new Solution())->minimumTotal($triangle) . "\n";

    $triangle = [
        [1],
        [0, 1],
        [1, 0, 1],
        [1, 0, 0, 1],
    ];
    echo (new Solution())->minimumTotal($triangle) . "\n";

    $triangle = [
        [-1],
        [2, 3],
        [1, -1, -3]
    ];
    echo (new Solution())->minimumTotal($triangle) . "\n";

    echo "======= test case end =======\n";
}