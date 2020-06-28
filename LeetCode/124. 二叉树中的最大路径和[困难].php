<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    private $sum = PHP_INT_MIN;

    function maxPathSum($root)
    {
        $this->helper($root);
        return $this->sum;
    }

    function helper($node)
    {
        if ($node == null) {
            return 0;
        }
        $leftGain = max($this->helper($node->left), 0);
        $rightGain = max($this->helper($node->right), 0);
        $pathVal = $node->val + $leftGain + $rightGain;
        $this->sum = max($pathVal, $this->sum);

        return $node->val + max($leftGain, $rightGain);
    }
}

mock();

function mock() {
    echo "======= test case start =======\n";
    $root = new TreeNode(-10);
    $node2 = new TreeNode(9);
    $node3 = new TreeNode(20);
    $node4 = new TreeNode(15);
    $node5 = new TreeNode(7);

    $root->left = $node2;
    $root->right = $node3;
    $node3->left = $node4;
    $node3->right = $node5;

    echo (new Solution())->maxPathSum($root)."\n";
    echo "======= test case end =======\n";
}