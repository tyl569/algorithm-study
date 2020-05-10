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

function ReverseList_2($pHead)
{
    $stack = new SplStack();
    while ($pHead != null) {
        $stack->push($pHead->val);
        $pHead = $pHead->next;
    }
    $newHead = new ListNode(null);
    $ret = $newHead;
    while (!$stack->isEmpty()) {
        $nodeVal = $stack->pop();
        $node = new ListNode($nodeVal);
        $newHead->next = $node;
        $newHead = $newHead->next;
    }

    return $ret->next;
}


$head = new ListNode(null);
$node1 = new ListNode(2);
$node2 = new ListNode(3);
$node3 = new ListNode(4);

$head->next = $node1;
$node1->next = $node2;
$node2->next = $node3;

var_dump(ReverseList($head));
var_dump(ReverseList_2($head));