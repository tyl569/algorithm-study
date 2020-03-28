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
