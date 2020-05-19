<?php


/**
 * @param $sequence
 *
 * 题目描述
 * 输入一个非空整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。
 *
 * 如果是则输出Yes,否则输出No。假设输入的数组的任意两个数字都互不相同。
 */
function VerifySquenceOfBST($sequence)
{
    if (empty($sequence)) {
        return false;
    }
    return helper($sequence, 0, count($sequence) - 1);
}

/**
 * @param $sequence
 * @param $i
 * @param $j
 * @return bool
 *
 * 划分左右子树
 *
 * 找到第一个大于根节点的值，索引为$m，此时左子树区间[$i, $m-1] 和 [$m, $j-1]
 *
 *
 */
function helper($sequence, $i, $j)
{
    if ($i >= $j) {
        return true;
    }
    $rootVal = $sequence[$j];
    $p = $i;
    while ($sequence[$p] < $rootVal) {
        $p++; // 找到第一个大于根节点的值
    }
    $m = $p;//记为$m
    while ($sequence[$p] > $rootVal) { // 找到根节点
        $p++;
    }
    return $p == $j && helper($sequence, $i, $m - 1) && helper($sequence, $m, $j - 1);
}

