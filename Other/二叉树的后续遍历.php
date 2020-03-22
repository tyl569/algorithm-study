<?php

require_once "../Struct/TreeNode.php";

/**
 * 二叉树先序遍历
 * 1
 *  \
 *   2
 *  /
 * 3
 *
 * 遍历后的数据[3,2,1]
 */

function solution($root)
{
    if ($root == null) {
        return [];
    }
    $res = [];
    helper($root, $res);
    return $res;
}

function helper(TreeNode $node, &$res)
{
    if ($node != null) {
        if ($node->left != null) {
            helper($node->left, $res);
        }
        if ($node->right != null) {
            helper($node->right, $res);
        }
        $res[] = $node->val;
    }
    return $res;
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(1);
    $node1 = null;
    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);
    $root->left = $node1;
    $root->right = $node2;
    $node2->left = $node3;

    $ret = solution($root);
    var_dump($ret);

    echo "======= test case end\n";
}