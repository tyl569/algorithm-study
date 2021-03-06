<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root)
    {
        if ($root == null) {
            return null;
        }
        $this->helper($root);
        return $root;
    }

    function helper(&$node)
    {
        if ($node != null) {
            $tmp = $node->left;
            $node->left = $node->right;
            $node->right = $tmp;
            $this->helper($node->left);
            $this->helper($node->right);
        }
    }

    function invertTree_2($root)
    {
        if (empty($root)) {
            return;
        }
        $queue = new SplQueue();
        $queue->push($root);
        while (!$queue->isEmpty()) {
            $node = $queue->pop();
            $tmp = $node->left;
            $node->left = $node->right;
            $node->right = $tmp;
            if ($node->right != null) {
                $queue->push($node->right);
            }
            if ($node->left != null) {
                $queue->push($node->left);
            }
        }
        return $root;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";

    $root = new TreeNode(4);

    $node2 = new TreeNode(2);
    $node3 = new TreeNode(7);

    $node4 = new TreeNode(1);
    $node5 = new TreeNode(3);

    $node6 = new TreeNode(6);
    $node7 = new TreeNode(9);

    $root->left = $node2;
    $root->right = $node3;
    $node2->left = $node4;
    $node2->right = $node5;

    $node3->left = $node6;
    $node3->right = $node7;

//    $newRoot = (new Solution())->invertTree($root);

    $newRoot = (new Solution())->invertTree_2($root);
    TreeNode::printTree($newRoot);

    echo "======= test case end =======\n";
}

