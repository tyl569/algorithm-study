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
