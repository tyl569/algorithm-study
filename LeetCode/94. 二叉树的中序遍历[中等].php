<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root)
    {
        if ($root == null) {
            return [];
        }
        $res = [];
        $this->helper($root, $res);
        return $res;
    }

    function helper($node, &$res)
    {
        if ($node != null) {
            if ($node->left != null) {
                $this->helper($node->left, $res);
            }
            $res[] = $node->val;
            if ($node->right != null) {
                $this->helper($node->right, $res);
            }
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(1);
    $node1 = null;
    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);
    $root->left = $node1;
    $root->right = $node2;
    $node2->left = $node3;

    $ret = (new Solution())->inorderTraversal($root);
    var_dump($ret);

    echo "======= test case end\n";
}