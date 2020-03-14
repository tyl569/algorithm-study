<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root)
    {
        return $this->dfs($root);
    }

    function dfs($node)
    {
        if ($node == null) {
            return 0;
        }
        if ($node->left == null && $node->right == null) {
            return $node->val;
        }
        $leftVal = 0;
        $rightVal = 0;
        if ($node->left != null) {
            $leftVal = $this->dfs($node->left);
        }
        if ($node->right != null) {
            $rightVal = $this->dfs($node->right);
        }

        return max($node->val, $node->val + $leftVal, $node->val + $rightVal);
    }
}

mock();

function mock()
{
    $root = new TreeNode(1);

    $left1 = new TreeNode(-2);
    $right1 = new TreeNode(3);

    $left11 = new TreeNode(4);

    $left111 = new TreeNode(5);
    $right112 = new TreeNode(10);

    $root->left = $left1;
    $root->right = $right1;
    $left1->left = $left11;
    $left11->left = $left111;
    $left11->right = $right112;


    /**
     *      1
     *     / \
     *    -2   3
     *   /      \
     *  4        2
     * / \
     * 5  10
     *
     * 最大路径: 1 -> -2 -> 4 -> 10
     * ret: 1 + (-2) + 4 + 10 = 13
     */

    echo "======= test case start =======\n";
    echo (new Solution())->sumNumbers($root) . "\n";
    echo "======= test case end =========\n";
}