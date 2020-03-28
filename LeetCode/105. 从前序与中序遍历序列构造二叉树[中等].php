<?php

require_once "../Struct/TreeNode.php";

class Solution
{

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {
        if (empty($inorder)) {
            return null;
        }
        $root = new TreeNode($preorder[0]);
        $index = array_search($preorder[0], $inorder);
        $root->left = $this->buildTree(array_slice($preorder, 1, $index + 1), array_slice($inorder, 0, $index));
        $root->right = $this->buildTree(array_slice($preorder, $index + 1), array_slice($inorder, $index + 1));
        return $root;
    }

    private $inmap; //反转中序数组中所有键以及它们关联的值
    private $preindex = 0; // 前序参数索引
    private $preorder;

    function buildTree_2($preorder, $inorder)
    {
        $this->preorder = $preorder;
        $this->inmap = array_flip($inorder);
        return $this->helper(0, count($inorder));
    }

    function helper($instart, $inend)
    {
        if ($instart == $inend) {
            return null;
        }
        $rootVal = $this->preorder[$this->preindex];
        $root = new TreeNode($rootVal);
        $rootIndex = $this->inmap[$rootVal];
        $this->preindex++;
        $root->left = $this->helper($instart, $rootIndex);
        $root->right = $this->helper($rootIndex + 1, $inend);
        return $root;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $preOrder = [3,9,20,15,7];
    $inOrder = [9,3,15,20,7];
    $root = (new Solution())->buildTree_2($preOrder, $inOrder);
    TreeNode::printTree($root);
    echo "======= test case end =======\n";
}