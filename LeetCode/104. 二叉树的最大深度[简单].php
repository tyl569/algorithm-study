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
        return max($left, $right)+1;
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

    echo (new Solution())->maxDepth($root)."\n";

    echo "======= test case end =======\n";

}

