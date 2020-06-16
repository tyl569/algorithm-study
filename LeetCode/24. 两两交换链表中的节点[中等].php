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

    function swapPairs2($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $first = $head;
        $second = $head->next;
        $first->next = $this->swapPairs2($second->next);
        $second->next = $first;
        return $second;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head)
    {
        $pre = new ListNode(0);
        $pre->next = $head;
        $tmp = $pre;
        while ($tmp->next != null && $tmp->next->next != null) {
            $first = $tmp->next;
            $second = $tmp->next->next;
            $tmp->next = $second;
            $first->next = $second->next;
            $second->next = $first;
            $tmp = $first;
        }
        return $pre->next;
    }
}


$node1 = new ListNode(1);
$head->next = $node1;
$node2 = new ListNode(2);
$node1->next = $node2;
$node3 = new ListNode(3);
$node2->next = $node3;
$node4 = new ListNode(4);
$node3->next = $node4;

function mock($head)
{
    $head1 = $head;
    echo "调换前链表:";
    while ($head != null) {
        echo $head->val;
        $head = $head->next;
    }
    echo "\n";
    $newHead = (new Solution())->swapPairs2($head1);
    echo "调换后链表:";
    while ($newHead != null) {
        echo $newHead->val;
        $newHead = $newHead->next;
    }
}

mock($node1);