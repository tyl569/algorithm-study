<?php

/**
 * @param $root
 * @return array
 *
 *
 * 题目描述
 * 从上往下打印出二叉树的每个节点，同层节点从左至右打印。
 *
 */
function PrintFromTopToBottom($root)
{
    $ret = [];
    $queue = new SplQueue();
    $queue->push($root);
    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();
        $ret[] = $node->val;
        if ($node->left != null) {
            $queue->push($node->left);
        }
        if ($node->right != null) {
            $queue->push($node->right);
        }
    }
    return $ret;
}