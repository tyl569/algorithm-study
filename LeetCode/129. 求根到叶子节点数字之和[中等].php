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
        $this->dfs($root, 0);
        return $this->sum;
    }

    private $sum = 0;

    function dfs($node, $rootVal)
    {
        if ($node == null) {
            return;
        }
        $current = 10 * $rootVal + $node->val;
        if ($node->left == null && $node->right == null) {
            $this->sum += $current;
            return;
        }
        $this->dfs($node->left, $current);
        $this->dfs($node->right, $current);
    }
}

mock();

function mock()
{
    $root = new TreeNode(1);

    $left1 = new TreeNode(2);
    $right1 = new TreeNode(3);

    $left11 = new TreeNode(4);

    $root->left = $left1;
    $root->right = $right1;
    $left1->left = $left11;


    /**
     *      1
     *     / \
     *    2   3
     *   /
     *  4
     *
     * ret: 124 + 13 = 137
     */

    echo "======= test case start =======\n";
    echo (new Solution())->sumNumbers($root) . "\n";
    echo "======= test case end =========\n";
}