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

        for ($i = 1; $i < count($intervals); $i++) {
            $cur = $intervals[$i];
            $front = $intervals[$i - 1];
            if ($cur[0] >= $front[0] && $cur[0] <= $front[1]) {
                $cur[0] = min($front[0], $cur[0]);
                $cur[1] = max($front[1], $cur[1]);
                $intervals[$i] = $cur;
                unset($intervals[$i - 1]);
            }
        }

        foreach ($intervals as $interval) {
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