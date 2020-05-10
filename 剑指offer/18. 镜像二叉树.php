<?php

/**
 * @param $root
 *
 *
 * 题目描述
 * 操作给定的二叉树，将其变换为源二叉树的镜像。
 *
 */
function Mirror(&$root)
{
    helper($root);
}

function helper(&$node)
{
    if ($node == null) {
        return;
    }
    $tmp = $node->left;
    $node->left = $node->right;
    $node->right = $tmp;
    helper($node->left);
    helper($node->right);
}