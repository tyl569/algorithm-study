<?php

require_once "../Struct/ListNode.php";

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $head = new ListNode(0);
        $p = $l1;
        $q = $l2;
        $cur = $head;
        $curry = 0;
        while ($p != null || $q != null) {
            $x = is_null($p) ? 0 : $p->val;
            $y = is_null($q) ? 0 : $q->val;
            $sum = $x + $y + $curry;
            $curry = (int)($sum / 10);
            $cur->next = new ListNode($sum % 10);
            $cur = $cur->next;
            if ($p != null) {
                $p = $p->next;
            }
            if ($q != null) {
                $q = $q->next;
            }
        }
        if ($curry > 0) {
            $cur->next = new ListNode($curry);
        }
        return $head->next;
    }
}