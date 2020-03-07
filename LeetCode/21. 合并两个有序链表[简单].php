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

    function mergeTwoLists($l1, $l2)
    {
        if ($l1 == null) {
            return $l2;
        }
        if ($l2 == null) {
            return $l1;
        }
        $head = new ListNode(null);
        $cur = $head;
        while ($l1 != null && $l2 != null) {
            if ($l1->val > $l2->val) {
                $cur->next = $l2;
                $l2 = $l2->next;
            } else {
                $cur->next = $l1;
                $l1 = $l1->next;
            }
            $cur = $cur->next;
        }
        if ($l2 != null) {
            $cur->next = $l2;
        }
        if ($l1 != null) {
            $cur->next = $l1;
        }
        return $head->next;
    }

    function mergeTwoLists2($l1, $l2)
    {
        if ($l1 == null) {
            return $l2;
        }
        if ($l2 == null) {
            return $l1;
        }
        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists2($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists2($l1, $l2->next);
            return $l2;
        }
    }
}