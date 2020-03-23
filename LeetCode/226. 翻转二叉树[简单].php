<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root)
    {
        if ($root == null) {
            return;
        }
        $this->helper($root);
        return $root;
    }

    function helper(&$node)
    {
        if ($node != null) {
            $tmp = $node->left;
            $node->left = $node->right;
            $node->right = $tmp;
            $this->helper($node->left);
            $this->helper($node->right);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $root = new TreeNode(4);

    $node2 = new TreeNode(2);
    $node3 = new TreeNode(7);

    $node4 = new TreeNode(1);
    $node5 = new TreeNode(3);

    $node6 = new TreeNode(6);
    $node7 = new TreeNode(9);

    $root->left = $node2;
    $root->right = $node3;
    $node2->left = $node4;
    $node2->right = $node5;

    $node3->left = $node6;
    $node3->right = $node7;

    $newRoot = (new Solution())->invertTree($root);

    TreeNode::printTree($newRoot);

    echo "======= test case end =======\n";
}

