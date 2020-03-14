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
class Solution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function maxDepth($root)
    {
        if ($root == null) {
            return 0;
        }
        $left = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);
        return max($left, $right) + 1;
    }
}