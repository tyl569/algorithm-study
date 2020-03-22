<?php

require_once "../Struct/TreeNode.php";

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