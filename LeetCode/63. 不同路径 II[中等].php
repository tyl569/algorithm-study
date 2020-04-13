<?php

class Solution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid)
    {
        if ($obstacleGrid[0][0] == 1) {
            return 0;
        }
        $obstacleGrid[0][0] = 1;
        for ($i = 1; $i < count($obstacleGrid); $i++) {
            if ($obstacleGrid[$i - 1][0] == 1 && $obstacleGrid[$i][0] == 0) {
                $obstacleGrid[$i][0] = 1;
            } else {
                $obstacleGrid[$i][0] = 0;
            }
        }
        for ($j = 1; $j < count($obstacleGrid[0]); $j++) {
            if ($obstacleGrid[0][$j - 1] == 1 && $obstacleGrid[0][$j] == 0) {
                $obstacleGrid[0][$j] = 1;
            } else {
                $obstacleGrid[0][$j] = 0;
            }
        }

        for ($i = 1; $i < count($obstacleGrid); $i++) {
            for ($j = 1; $j < count($obstacleGrid[0]); $j++) {
                if ($obstacleGrid[$i][$j] == 0) {
                    $obstacleGrid[$i][$j] = $obstacleGrid[$i - 1][$j] + $obstacleGrid[$i][$j - 1];

                } else {
                    $obstacleGrid[$i][$j] = 0;
                }
            }
        }

        return $obstacleGrid[count($obstacleGrid) - 1][count($obstacleGrid[0]) - 1];

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $grid = [
        [0, 0, 0],
        [0, 1, 0],
        [0, 0, 0]
    ];
    echo (new Solution())->uniquePathsWithObstacles($grid) . "\n";

    $grid = [
        [0, 0, 0, 0],
        [0, 1, 0, 0],
        [0, 0, 0, 0],
        [0, 0, 0, 0]
    ];
    echo (new Solution())->uniquePathsWithObstacles($grid) . "\n";

    $grid = [
        [0, 0, 0, 0],
    ];
    echo (new Solution())->uniquePathsWithObstacles($grid) . "\n";
//
//    $grid = [
//        [0, 1, 0, 0],
//        [0, 1, 0, 0],
//    ];
//    echo (new Solution())->uniquePathsWithObstacles($grid) . "\n";


    echo "======= test case end =======\n";
}