<?php

require_once "../Struct/ListNode.php";

class Solution
{

    function removeNthFromEnd($head, $n)
    {
        $len = 0;
        $tmp1 = new ListNode(0);
        $tmp1->next = $head;
        $tmp = $tmp1;
        while ($head != null) {
            $len++; // 统计节点的个数
            $head = $head->next;
        }
        $len -= $n;
        while ($len > 0) {
            $len--;
            $tmp1 = $tmp1->next;
        }
        $tmp1->next = $tmp1->next->next;
        return $tmp->next;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $node1 = new ListNode(1);
    $node2 = new ListNode(2);
    $node3 = new ListNode(3);
    $node4 = new ListNode(4);
    $node5 = new ListNode(5);

    $node1->next = $node2;
    $node2->next = $node3;
    $node3->next = $node4;
    $node4->next = $node5;

    $ret = (new Solution())->removeNthFromEnd($node1, 3);

    ListNode::printListNode($ret);
    echo "======= test case end =======\n";
}