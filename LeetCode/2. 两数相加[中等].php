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
        $cur = $head;

        $tmp = 0; // 用来统计进制
        while ($l1 != null || $l2 != null) {
            $x = is_null($l1) ? 0 : $l1->val;
            $y = is_null($l2) ? 0 : $l2->val;
            $curVal = $x + $y + $tmp;
            $cur->next = new ListNode($curVal % 10);
            $cur = $cur->next;
            $tmp = intval($curVal / 10);
            if ($l1 != null) {
                $l1 = $l1->next;
            }
            if ($l2 != null) {
                $l2 = $l2->next;
            }
        }
        if ($tmp > 0) {
            $cur->next = new ListNode($tmp);
        }
        return $head->next;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $l11 = new ListNode(2);
    $l12 = new ListNode(4);
    $l13 = new ListNode(3);
    $l11->next = $l12;
    $l12->next = $l13;


    $l21 = new ListNode(5);
    $l22 = new ListNode(6);
    $l23 = new ListNode(4);
    $l21->next = $l22;
    $l22->next = $l23;

    $ret = (new Solution())->addTwoNumbers($l11, $l21);
    var_dump($ret);
    echo "======= test case end =======\n";
}