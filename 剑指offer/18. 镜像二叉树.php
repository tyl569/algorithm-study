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
    if ($root == null) {
        return;
    }
    $tmp = $root->left;
    $root->left = $root->right;
    $root->right = $tmp;
    Mirror($root->left);
    Mirror($root->right);
}