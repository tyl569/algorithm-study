<?php

/**
 * @param $root
 * @param $expectNumber
 *
 *
 * 题目描述
 * 输入一颗二叉树的根节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。
 *
 * 路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。
 */
function FindPath($root, $expectNumber)
{
    $result = [];
    helper($root, $expectNumber, 0, [], $result);
    return $result;
}

function helper($node, $expectNumber, $curSum, $list, &$result)
{
    if ($node == null) {
        return;
    }
    $rootVal = $node->val;
    $list[] = $rootVal;
    $curSum += $rootVal;
    if ($curSum == $expectNumber && $node->left == null && $node->right == null) { // 是否到了子叶节点
        $result[] = $list;
    }
    helper($node->left, $expectNumber, $curSum, $list, $result);
    helper($node->right, $expectNumber, $curSum, $list, $result);
    array_pop($list);
}