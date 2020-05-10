<?php

require_once "../Struct/ListNode.php";

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