<?php

require_once "../Struct/TreeNode.php";

class Solution
{
    private $ans = null;

    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q)
    {
        if (!$root || $root == $p || $root == $q) {
            return $root;
        }
        $left = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);
        if ($left && $right) {
            return $root;
        }
        return $left ? $left : $right;
    }
}