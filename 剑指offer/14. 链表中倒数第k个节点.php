<?php

require_once "../Struct/ListNode.php";

/**
 * @param $head
 * @param $k
 * @return int
 *
 *
 * 题目描述
 * 输入一个链表，输出该链表中倒数第k个结点。
 */
function FindKthToTail($head, $k)
{

    $len = 0;
    $tmp = $head;
    while ($head != null) {
        $len++;
        $head = $head->next;
    }
    if ($len < $k) {
        return 0;
    }
    for ($i = 0; $i < $len - $k; $i++) {
        $tmp = $tmp->next;
    }

    return $tmp;
}