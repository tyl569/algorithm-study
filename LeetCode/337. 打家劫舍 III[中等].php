<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function rob($root)
    {
        return $this->helper($root);
    }

    function helper($node)
    {
        if ($node == null) {
            return 0;
        }
        $doIt = $node->val + ($node->left == null ? 0 : $this->helper($node->left->left) + $this->helper($node->left->right))
                + ($node->right == null ? 0 : $this->helper($node->right->left) + $this->helper($node->right->right));
        $undoIt = $this->helper($node->left) + $this->helper($node->right);
        return max($doIt, $undoIt);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(3);
    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);
    $node4 = new TreeNode(3);
    $node5 = new TreeNode(1);
    $root->left = $node2;
    $root->right = $node3;

    $node2->right = $node4;
    $node3->right = $node5;

    echo (new Solution())->rob($root) . "\n";
    echo "======= test case end =======\n";
}