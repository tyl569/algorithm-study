<?php

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals)
    {
        usort($intervals, function ($a, $b) {
            return $a[0] - $b[0]; // 先根据第一项进行排序
        });
        $res = [];
        $idx = -1;

        foreach ($intervals as $interval) {
            // 如果最开始没有元素，或者当前的第一个元素的开始值比前个元素结束值大，直接插入
            if ($idx == -1 || $interval[0] > $res[$idx][1]) {
                $res[++$idx] = $interval;
            } else {
                $res[$idx][1] = max($res[$idx][1], $interval[1]);
            }
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->merge([[1, 3], [2, 6], [8, 10], [15, 18]]));
    var_dump((new Solution())->merge([[1, 4], [4, 5]]));
    var_dump((new Solution())->merge([[1, 1], [1, 2]]));
    var_dump((new Solution())->merge([[1, 4], [0, 4]]));
    var_dump((new Solution())->merge([[1, 1], [2, 2], [1, 3]]));
    echo "=======test case end ========\n";
}