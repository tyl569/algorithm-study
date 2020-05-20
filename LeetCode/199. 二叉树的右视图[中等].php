<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */

    function rightSideView($root)
    {
        $val = [$root->val];
        $level = 1;
        $this->helper($root, $level, $val);
        return $val;
    }

    function helper($node, $level, &$val)
    {
        if ($node == null) {
            return;
        }
        if ($node->right != null) {
            $val[$level] = $node->right->val;
        } elseif ($node->left != null) {
            $val[$level] = $node->left->val;
        }
        $this->helper($node->left, $level + 1, $val);
        $this->helper($node->right, $level + 1, $val);
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(1);

    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);

    $node4 = new TreeNode(5);
    $node5 = new TreeNode(4);
    $root->left = $node2;
    $root->right = $node3;

    $node2->right = $node4;
    $node3->right = $node5;


//    $root = new TreeNode(1);
//
//    $node2 = new TreeNode(2);
//    $node3 = new TreeNode(3);
//
//    $node4 = new TreeNode(4);
//
//    $root->left = $node2;
//    $root->right = $node3;
//
//    $node2->right = $node4;


    $arr = (new Solution())->rightSideView($root);
    var_dump($arr);


    echo "======= test case end =======\n";
}