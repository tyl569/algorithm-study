<?php
require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root)
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
            $res[] = $node->val;
            if ($node->left != null) {
                $this->helper($node->left, $res);
            }
            if ($node->right != null) {
                $this->helper($node->right, $res);
            }
        }
        return $res;
    }

    function preorderTraversal_2($root)
    {
        if ($root == null) {
            return [];
        }
        $stack = new SplStack();
        $stack->push($root);
        $res = [];
        while (!$stack->isEmpty()) {
            $cur = $stack->pop();
            $res[] = $cur->val;
            if ($cur->right != null) {
                $stack->push($cur->right);
            }
            if ($cur->left != null) {
                $stack->push($cur->left);
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

    var_dump((new Solution())->preorderTraversal($root));
    var_dump((new Solution())->preorderTraversal_2($root));
    echo "======= test case end\n";
}