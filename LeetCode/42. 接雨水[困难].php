<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $totalVol = 0;
        for ($i = 1; $i < count($height); $i++) {
            $iHeight = $height[$i];
            $iLeftMax = 0;
            $iRightMax = 0;
            for ($j = 0; $j < $i; $j++) {
                $iLeftMax = max($iLeftMax, $height[$j]);
            }
            for ($k = $i + 1; $k < count($height); $k++) {
                $iRightMax = max($iRightMax, $height[$k]);
            }
            $iLimit = min($iLeftMax, $iRightMax);
            if ($iLimit <= $iHeight) {
                continue;
            }
            $totalVol += $iLimit - $iHeight;
        }
        return $totalVol;
    }

    function trap_2($height)
    {
        $totalVol = 0;
        $leftMax[0] = $height[0];
        $rightMax[count($height) - 1] = $height[count($height) - 1];
        for ($i = 1; $i < count($height); $i++) {
            $leftMax[$i] = max($leftMax[$i - 1], $height[$i - 1]);
        }
        for ($j = count($height) - 2; $j >= 0; $j--) {
            $rightMax[$j] = max($rightMax[$j + 1], $height[$j + 1]);
        }
        for ($k = 1; $k < count($height) - 1; $k++) {
            $iLimit = min($leftMax[$k], $rightMax[$k]);
            if ($height[$k] >= $iLimit) {
                continue;
            }
            $totalVol += $iLimit - $height[$k];
        }
        return $totalVol;
    }

    function trap_3($height)
    {
        $totalVol = 0;
        $left = 0;
        $right = count($height) - 1;
        $leftMax = 0;
        $rightMax = 0;

        while ($left < $right) {
            if ($height[$left] < $height[$right]) {
                if ($leftMax < $height[$left]) {
                    $leftMax = $height[$left];
                }
                if ($leftMax - $height[$left] > 0) {
                    $totalVol += $leftMax - $height[$left];
                }
                $left ++;
            } else {
                if ($rightMax < $height[$right]) {
                    $rightMax = $height[$right];
                }
                if ($rightMax - $height[$right] > 0) {
                    $totalVol += $rightMax - $height[$right];
                }
                $right --;
            }
        }
        return $totalVol;
    }


}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $height = [0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1];
    echo (new Solution())->trap($height) . "\n";
    echo (new Solution())->trap_2($height) . "\n";
    echo (new Solution())->trap_3($height) . "\n";
    echo "======= test case end =======\n";
}