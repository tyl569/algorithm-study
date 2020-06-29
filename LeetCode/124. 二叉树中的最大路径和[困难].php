<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    private $maxSum = PHP_INT_MIN;

    function maxPathSum($root)
    {
        $this->helper($root);
        return $this->maxSum;
    }

    function helper($node)
    {
        if ($node == null) {
            return 0;
        }
        $leftGain = max($this->helper($node->left), 0);
        $rightGain = max($this->helper($node->right), 0);

        $pathVal = $node->val + $leftGain + $rightGain;
        $this->maxSum = max($this->maxSum, $pathVal);

        return $node->val + max($leftGain, $rightGain);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $node1 = new TreeNode(-10);
    $node2 = new TreeNode(9);
    $node3 = new TreeNode(20);
    $node4 = new TreeNode(15);
    $node5 = new TreeNode(7);

    $node1->left = $node2;
    $node1->right = $node3;
    $node3->left = $node4;
    $node3->right = $node5;

    $ret = (new Solution())->maxPathSum($node1);
    var_dump($ret);

    echo "======= test case end =======\n";
}