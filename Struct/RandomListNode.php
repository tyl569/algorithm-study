<?php

class RandomListNode
{
    public $label = null;
    public $next = null;
    public $random = null;

    function __construct($x)
    {
        $this->label = $x;
    }
}