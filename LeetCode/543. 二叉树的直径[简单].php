<?php

require_once "../Struct/TreeNode.php";

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    private $step = 0;

    function diameterOfBinaryTree($root)
    {
        $this->helper($root);
        return $this->step;
    }

    function helper($node)
    {
        if ($node == null) {
            return;
        }
        $left = $this->helper($node->left);
        $right = $this->helper($node->right);
        $this->step = max($left + $right, $this->step);
        return max($left, $right) + 1;
    }
}

mock();

function mock()
{
    echo "======= test case start ======= \n";
    $root = new TreeNode(1);
    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);
    $node4 = new TreeNode(4);
    $node5 = new TreeNode(5);
    $root->left = $node2;
    $root->right = $node3;

    $node2->left = $node4;
    $node2->right = $node5;

    echo (new Solution())->diameterOfBinaryTree($root) . "\n";
    echo "======= test case end ======\n";
}