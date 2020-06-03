<?php

class Solution
{

    /**
     * @param Integer[][] $costs
     * @return Integer
     */
    function twoCitySchedCost($costs)
    {
        $len = count($costs);
        $cha = [];
        $sum = 0;
        for ($i = 0; $i < $len; $i++) {
            $cha[$i] = $costs[$i][1] - $costs[$i][0]; // 计算人员到A城与到B城的消耗差
            $sum += $costs[$i][0]; // 计算所有人到A成的费用
        }
        sort($cha);
        for ($i = 0; $i < intval($len / 2); $i++) {
            $sum += $cha[$i]; // 减去应该到B成的人员的额外消耗
        }
        return $sum;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->twoCitySchedCost([[10, 20], [30, 200], [400, 50], [30, 20]]) . "\n";
    echo "======= test case end =======\n";
}