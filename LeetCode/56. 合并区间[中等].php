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
        $idx = -1; // 使用idx，不用每次统计数组
        for ($i = 0; $i < count($intervals); $i++) {
            // 如果是第一个元素，默认插入
            // 比较res最后一个元素的结束值和当前元素开始值
//            if ($i == 0 || $intervals[$i][0] > $res[count($res) - 1][1]) {
//                $res[] = $intervals[$i];
//            } else {
//                $res[count($res) - 1][1] = max($res[count($res) - 1][1], $intervals[$i][1]);
//            }
            if ($i == 0 || $intervals[$i][0] > $res[$idx][1]) {
                $res[++$idx] = $intervals[$i];
            } else {
                $res[$idx][1] = max($res[$idx][1], $intervals[$i][1]);
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