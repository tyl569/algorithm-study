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

    function solution_2($root)
    {
        $stack = new SplStack();
        $curr = $root;
        $res = [];
        while ($curr != null || !$stack->isEmpty()) {
            while ($curr != null) {
                $stack->push($curr);
                $curr = $curr->left;
            }
            $curr = $stack->pop();
            $res[] = $curr->val;
            $curr = $curr->right;
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(1);
    $node2 = new TreeNode(2);
    $node3 = new TreeNode(3);
    $node4 = new TreeNode(4);
    $node5 = new TreeNode(5);
    $node6 = new TreeNode(6);

    $root->left = $node2;
    $root->right = $node3;

    $node2->left = $node4;
    $node2->right = $node5;
    $node3->left = $node6;

    var_dump((new Solution())->inorderTraversal($root));
    var_dump((new Solution())->solution_2($root));

    echo "======= test case end\n";
}