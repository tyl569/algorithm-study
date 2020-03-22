<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if ($root == null) {
            return [];
        }

        $res[0][] = $root->val;
        $level = 1;
        $this->helper($root->left, $root->right, $res, $level);
        return $res;
    }

    function helper($left, $right, &$res, $lever)
    {
        if ($left != null || $right != null) {
            if ($left != null) {
                $res[$lever][] = $left->val;
            }
            if ($right != null) {
                $res[$lever][] = $right->val;
            }
            $lever++;
            $this->helper($left->left, $left->right, $res, $lever);
            $this->helper($right->left, $right->right, $res, $lever);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new TreeNode(3);
    $node2 = new TreeNode(9);
    $node3 = new TreeNode(20);

    $node4 = new TreeNode(15);
    $node5 = new TreeNode(7);
    $node6 = new TreeNode(8);


    $root->left = $node2;
    $root->right = $node3;

    $node2->left = $node6;

    $node3->left = $node4;
    $node3->right = $node5;

    var_dump((new Solution())->levelOrder($root));

    echo "======= test case end\n";

}