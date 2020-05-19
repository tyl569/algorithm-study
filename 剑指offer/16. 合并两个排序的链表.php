<?php

/**
 * @param $pHead1
 * @param $pHead2
 *
 *
 * 题目描述
 * 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。
 */
function Merge($pHead1, $pHead2)
{
    if ($pHead2 == null) {
        return $pHead1;
    }
    if ($pHead1 == null) {
        return $pHead2;
    }
    if ($pHead1->val < $pHead2->val) {
        $pHead1->next = Merge($pHead1->next, $pHead2);
        return $pHead1;
    } else {
        $pHead2->next = Merge($pHead1, $pHead2->next);
        return $pHead2;
    }
}

function Merge_2($pHead1, $pHead2)
{
    $node = new ListNode(null);
    $ret = $node;
    while ($pHead1 && $pHead2) {
        if ($pHead1->val < $pHead2->val) {
            $node->next = $pHead1;
            $pHead1 = $pHead1->next;
        } else {
            $node->next = $pHead2;
            $pHead2 = $pHead2->next;
        }
        $node = $node->next;

    }

    if ($pHead1 != null) {
        $node->next = $pHead1;
    }

    if ($pHead2 != null) {
        $node->next = $pHead2;
    }
    return $ret->next;
}


