<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{
    function reverseList($head)
    {
        $newHead = null;
        while ($head != null) {
            $tmp = $head->next;
            $head->next = $newHead;
            $newHead = $head;
            $head = $tmp;
        }
        return $newHead;
    }

    // 递归方法
    function reverseList2($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $p = $this->reverseList2($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $p;
    }

    function mergeTwoLists($l1, $l2) {
        if ($l1 == null) {
            return $l2;
        }
        if ($l2 == null) {
            return $l1;
        }
        if ($l1->val > $l2->val) {
            $l2->next = $l1;
            return $this->mergeTwoLists($l1->next, $l2);
        } else {
            $l1->next = $l2;
            return $this->mergeTwoLists($l1, $l2->next);
        }
    }
}

$head = new ListNode(null);
$node1 = new ListNode(1);
$head->next = $node1;
$node2 = new ListNode(2);
$node1->next = $node2;
$node3 = new ListNode(3);
$node2->next = $node3;
$node4 = new ListNode(4);
$node3->next = $node4;
$node5 = new ListNode(5);
$node4->next = $node5;

function mock($head)
{
    $head1 = $head;
    echo "反转前的链表:";
    while ($head != null) {
        echo $head->val;
        $head = $head->next;
    }
    echo "\n";
    $newHead = (new Solution())->reverseList($head1);
    echo "反转后的链表:";
    while ($newHead != null) {
        echo $newHead->val;
        $newHead = $newHead->next;
    }
}

function mock2($head)
{
    $head1 = $head;
    echo "反转前的链表:";
    while ($head != null) {
        echo $head->val;
        $head = $head->next;
    }
    echo "\n";
    $newHead = (new Solution())->reverseList2($head1);
    echo "反转后的链表:";
    while ($newHead != null) {
        echo $newHead->val;
        $newHead = $newHead->next;
    }
}

//mock($head);
mock2($head);
