<?php
/**
 * 题目描述
 * 输入两棵二叉树A，B，判断B是不是A的子结构。（ps：我们约定空树不是任意一个树的子结构）
 */

function HasSubtree($pRoot1, $pRoot2)
{
    if ($pRoot1 == null || $pRoot2 == null) {
        return false;
    }
    return helper($pRoot1, $pRoot2) || helper($pRoot1->left, $pRoot2) || helper($pRoot1->right, $pRoot2);
}

function helper($pRoot1, $pRoot2)
{
    if ($pRoot2 == null) {
        return true;
    }
    if ($pRoot1 == null) {
        return false;
    }
    if ($pRoot2->val != $pRoot1->val) {
        return false;
    }
    return helper($pRoot1->left, $pRoot2->left) && helper($pRoot1->right, $pRoot2->right);
}
