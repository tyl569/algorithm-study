<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->helper($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    function helper($node, $lower, $upper)
    {
        if ($node == null) {
            return true;
        }
        if ($node->val <= $lower || $node->val >= $upper) {
            return false;
        }
        return $this->helper($node->left, $lower, $node->val)
            && $this->helper($node->right, $node->val, $upper);
    }


}

mock();

function mock()
{
    echo "======= test case start =======\n";
//
//    $root = new TreeNode(5);
//
//    $node2 = new TreeNode(1);
//    $node3 = new TreeNode(4);
//
//    $node4 = new TreeNode(3);
//    $node5 = new TreeNode(6);
//
//
//    $root->left = $node2;
//    $root->right = $node3;
//    $node2->left = $node4;
//    $node2->right = $node5;


    $root = new TreeNode(2);

    $node2 = new TreeNode(1);
    $node3 = new TreeNode(4);

    $node4 = new TreeNode(3);
    $node5 = new TreeNode(6);


    $root->left = $node2;
    $root->right = $node3;
    $node3->left = $node4;
    $node3->right = $node5;

    $ret = (new Solution())->isValidBST($root);
    var_dump($ret);

    echo "======= test case end =======\n";
}
