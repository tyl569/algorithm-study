<?php

require_once "../Struct/RandomListNode.php";
/**
 * 题目描述
 *
 * 输入一个复杂链表
 * （每个节点中有节点值，以及两个指针，一个指向下一个节点，另一个特殊指针random指向一个随机节点），
 * 请对此链表进行深拷贝，并返回拷贝后的头结点。
 * （注意，输出结果中请不要返回参数中的节点引用，否则判题程序会直接返回空）
 *
 *
 */
function MyClone($pHead)
{
    if ($pHead == null) {
        return null;
    }
    $cur = $pHead;
    while ($cur != null) {
        $clone = new RandomListNode($cur->label); // 新建一个节点
        $clone->next = $cur->next; // 赋值next的值

        $cur->next = $clone; // 指向下个节点
        $cur = $clone->next; // 循环到下个节点
    }

    $cur = $pHead;
    while ($cur != null) {
        $clone = $cur->next;
        if ($cur->random != null) {
            $clone->random = $cur->random->next;
        }
        $cur = $clone->next;
    }

    $cur = $pHead;
    $pCloneHead = $pHead->next;
    while ($cur->next != null) {
        $next = $cur->next;
        $cur->next = $next->next;
        $cur = $next;
    }
    return $pCloneHead;
}