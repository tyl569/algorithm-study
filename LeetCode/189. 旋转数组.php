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
}

$nums = [1, 2, 3, 4, 5, 6, 7];
$k = 3;
$ret = (new Solution())->rotate($nums, $k);
var_dump($ret);