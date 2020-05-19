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

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer[][]
     */
    private $result = [];

    function pathSum($root, $sum)
    {
        $this->helper($root, $sum, 0, []);
        return $this->result;
    }

    function helper($node, $sum, $curSum, $list)
    {
        if ($node == null) {
            return;
        }
        $rootVal = $node->val;
        $curSum += $rootVal;
        $list[] = $rootVal;
        if ($curSum == $sum && $node->left == null && $node->right == null) {
            $this->result[] = $list;
        }
        $this->helper($node->left, $sum, $curSum, $list);
        $this->helper($node->right, $sum, $curSum, $list);
        array_pop($list);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $root = new TreeNode(5);
    $node2 = new TreeNode(4);
    $node3 = new TreeNode(8);
    $node4 = new TreeNode(11);
    $node5 = new TreeNode(13);
    $node6 = new TreeNode(4);
    $node7 = new TreeNode(7);
    $node8 = new TreeNode(2);
    $node9 = new TreeNode(5);
    $node10 = new TreeNode(1);

    $root->left = $node2;
    $root->right = $node3;

    $node2->left = $node4;
    $node3->left = $node5;
    $node3->right = $node6;

    $node4->left = $node7;
    $node4->right = $node8;

    $node6->left = $node9;
    $node6->right = $node10;

    var_dump((new Solution())->pathSum($root, 22));

    echo "======= tes case end =======\n";
}