<?php

require_once "../Struct/ListNode.php";

function printListFromTailToHead($head)
{
    $stack = new SplStack();
    while ($head != null) {
        $stack->push($head->val);
        $head = $head->next;
    }
    $arr = [];
    while (!$stack->isEmpty()) {
        $arr[] = $stack->pop();
    }
    return $arr;
}

$head = new ListNode(1);
$node1 = new ListNode(2);
$node2 = new ListNode(3);
$node3 = new ListNode(4);
$node4 = new ListNode(5);

$head->next = $node1;
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;

var_dump(printListFromTailToHead($head));