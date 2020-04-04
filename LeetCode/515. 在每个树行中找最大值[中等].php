<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    private $result = [];

    function largestValues($root)
    {
        if ($root == null) {
            return [];
        }
        $this->helper($root, 0);

        return $this->result;
    }

    function helper($node, $level)
    {
        if ($node != null) {
            if (!isset($this->result[$level])) {
                $this->result[$level] = $node->val;
            } else {
                $this->result[$level] = max($this->result[$level], $node->val);
            }

            if ($node->left != null) {
                $this->helper($node->left, $level + 1);
            }
            if ($node->right != null) {
                $this->helper($node->right, $level + 1);
            }
        }

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(1);

    $node2 = new TreeNode(3);
    $node3 = new TreeNode(2);

    $node4 = new TreeNode(5);
    $node5 = new TreeNode(3);

    $node6 = new TreeNode(9);

    $root->left = $node2;
    $root->right = $node3;

    $node2->left = $node4;
    $node2->right = $node5;

    $node3->right = $node6;

    var_dump((new Solution())->largestValues($root));


    echo "======= test case end =======\n";
}