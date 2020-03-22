<?php

require_once "../Struct/NTreeNode.php";

class Solution
{
    function postorder($root)
    {
        if ($root == null) {
            return [];
        }
        $res = [];
        $this->helper($root, $res);
        return $res;
    }

    function helper(NTreeNode $node, &$res)
    {
        if ($node != null) {
            if ($node->children != null && !empty($node->children)) {
                foreach ($node->children as $childNode) {
                    $this->helper($childNode, $res);
                }

            }
            $res[] = $node->val;
        }
        return $res;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $root = new NTreeNode(1);
    $node2 = new NTreeNode(2);
    $node3 = new NTreeNode(3);
    $node4 = new NTreeNode(4);
    $node5 = new NTreeNode(5);
    $node6 = new NTreeNode(6);

    $root->children = [
        $node3, $node2, $node4
    ];

    $node3->children = [
        $node5, $node6
    ];

    var_dump((new Solution())->postorder($root));
    echo "======= test case end =======\n";
}
