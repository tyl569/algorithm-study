<?php

$pre = null;
$head = null;

function Convert($pRootOfTree)
{
    global $head;
    helper($pRootOfTree);
    return $head;
}

// 转换为中序遍历，然后调整节点前后指针
function helper($node)
{
    global $head;
    global $pre;
    if ($node == null) {
        return;
    }
    helper($node->left);
    if ($pre != null) {
        $pre->right = $node;
    } else {
        $head = $node;
    }
    $node->left = $pre;
    $pre = $node;
    helper($node->right);
}