<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $k = $k % count($nums);
        $len = count($nums);
        $count = 0;
        for ($start = 0; $count < $len; $start++) {
            $current = $start;
            $prev = $nums[$start];
            do {
                $next = ($current + $k) % $len; // 移动后的位置
                $temp = $nums[$next];
                $nums[$next] = $prev; // 将当前的元素进行移动
                $current = $next; // 被替换的元素变成current
                $prev = $temp;
                $count++;
            } while ($start != $current);
        }
        return $nums;
    }

    /**
     * @param $nums
     * @param $k
     * @return mixed
     *
     * 三次旋转
     *
     * 当我们旋转数组 k 次， k\%nk%n 个尾部元素会被移动到头部，剩下的元素会被向后移动。
     *
     * eg: [1,2,3,4,5,6,7]
     *
     * 1、我们先把所有数组反转：[7,6,5,4,3,2,1]
     * 2、我们把前k个元素反正换：[5,6,7,4,3,2,1]
     * 3、我们把k后面的元素反转：[5,6,7,1,2,3,4]
     * 得到了目标数据
     */
    function rotateByReverse(&$nums, $k)
    {
        $k = $k % count($nums);
        $this->Reverse($nums, 0, count($nums) - 1);
        $this->Reverse($nums, 0, $k - 1);
        $this->Reverse($nums, $k, count($nums) - 1);
        return $nums;
    }

    function Reverse(&$nums, $start, $end)
    {
        while ($start < $end) {
            $tmp = $nums[$end];
            $nums[$end] = $nums[$start];
            $nums[$start] = $tmp;
            $start++;
            $end--;
        }
    }
}

$nums = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
//$ret = (new Solution())->rotate($nums, $k);
$ret = (new Solution())->rotateByReverse($nums, $k);
var_dump($ret);