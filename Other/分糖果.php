<?php
/**
 *假设你是一位很有爱的幼儿园老师，想要给幼儿园的小朋友们一些小糖果。
 * 但是，每个孩子最多只能给一块糖果。
 * 对每个孩子 i ，都有一个胃口值 gi ，这是能让孩子们满足胃口的糖果的最小尺寸；
 * 并且每块糖果 j ，都有一个尺寸 sj 。
 * 如果 sj >= gi ，我们可以将这个糖果 j 分配给孩子 i ，这个孩子会得到满足。
 * 你的目标是尽可能满足越多数量的孩子，并输出这个最大数值。
 *
 * 注意：
 * 你可以假设胃口值为正。
 * 一个小朋友最多只能拥有一块糖果。
 *
 */

// 为了尽可能满足更多小朋友，最好从gi小的值开始分配
function solution($children, $surger)
{
    $i = 0;
    $j = 0;
    $num = 0;
    sort($children);
    sort($surger);

    while ($i < count($children) && $j < count($surger)) {
        // 如果满足小朋友的口味，继续分配下个小朋友和糖果
        if ($children[$i] <= $surger[$j]) {
            $num++;
            $i++;
            $j++;
        } else {
            $j++;
        }
    }
    return $num;
}


function mock()
{
    echo "========= test case start =========\n";
    echo solution([1, 2, 3], [1, 1]);
    echo "\n";
    echo solution([1, 2, 3, 5], [1, 1, 4]);
    echo "\n";
    echo solution([3, 4, 5, 6, 1, 2], [4, 6, 7]);
    echo "\n";
    echo "========= test case end =========\n";
}



