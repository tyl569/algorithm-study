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

function helper($sequence, $i, $j)
{
    if ($i > $j) {
        return true;
    }
    $p = $i;
    while ($sequence[$p] < $sequence[$j]) {
        $p++;
    }
    $m = $p;
    while ($sequence[$p] > $sequence[$j]) {
        $p++;
    }
    return $p == $j && helper($sequence, $i, $m - 1) && helper($sequence, $m, $j - 1);
}
