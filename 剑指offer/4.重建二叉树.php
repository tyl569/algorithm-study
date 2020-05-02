<?php

require_once "../Struct/TreeNode.php";
/**
 * 题目描述
 * 输入某二叉树的前序遍历和中序遍历的结果，请重建出该二叉树。
 * 假设输入的前序遍历和中序遍历的结果中都不含重复的数字。
 * 例如输入前序遍历序列{1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}，则重建二叉树并返回。
 *
 *
 * @param $pre
 * @param $vin
 */

function reConstructBinaryTree($pre, $vin)
{
    $root = helper($pre, 0, count($pre) - 1, $vin, 0, count($vin) - 1);
    return $root;
}

function helper($pre, $preStart, $preEnd, $in, $inStart, $inEnd)
{
    if ($preStart > $preEnd || $inStart > $inEnd) {
        return null;
    }
    $root = new TreeNode($pre[$preStart]);
    for ($i = $inStart; $i <= $inEnd; $i++) {
        if ($in[$i] == $pre[$preStart]) {
            $root->left = helper($pre, $preStart + 1, $preStart + $i - $inStart, $in, $inStart, $i - 1);
            $root->right = helper($pre, $preStart + $i - $inStart + 1, $preEnd, $in, $i + 1, $inEnd);
        }
    }
    return $root;
}