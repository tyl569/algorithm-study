<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root)
    {
        if ($root == null) {
            return 0;
        }
        if ($root->left == null && $root->right == null) {
            return 1;
        }
        $deep = PHP_INT_MAX;
        if ($root->left != null) {
            $deep = min($this->minDepth($root->left), $deep);
        }
        if ($root->right != null) {
            $deep = min($this->minDepth($root->right), $deep);
        }
        return $deep + 1;

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(3);

    $node2 = new TreeNode(9);
    $node3 = new TreeNode(20);

    $node4 = new TreeNode(15);
    $node5 = new TreeNode(17);

    $root->left = $node2;
    $root->right = $node3;
    $node3->left = $node4;
    $node3->right = $node5;

    echo (new Solution())->minDepth($root) . "\n";

    echo "======= test case end =======\n";

}