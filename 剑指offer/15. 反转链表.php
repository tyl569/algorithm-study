<?php

require_once "../Struct/ListNode.php";

function ReverseList($pHead)
{
    $newHead = null;
    while ($pHead != null) {
        $tmp = $pHead->next;
        $pHead->next = $newHead;
        $newHead = $pHead;
        $pHead = $tmp;
    }
    return $newHead;
}

$head = new ListNode(null);
$node1 = new ListNode(2);
$node2 = new ListNode(3);
$node3 = new ListNode(4);

$head->next = $node1;
$node1->next = $node2;
$node2->next = $node3;

