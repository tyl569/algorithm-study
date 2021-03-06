<?php

class MyCircularDeque
{
    public $count = 0;
    public $head = 0;
    public $tail = 0;
    public $queue = [];

    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k)
    {
        $this->count = $k + 1;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->head = ($this->head - 1 + $this->count) % $this->count;
        $this->queue[$this->head] = $value;
        return true;
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull()
    {
        return ($this->tail + 1) % $this->count == $this->head;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->queue[$this->tail] = $value;
        $this->tail = ($this->tail + 1) % $this->count;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront()
    {
        if ($this->isEmpty()) {
            return false;
        }
        $this->head = ($this->head + 1) % $this->count;
        return true;
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty()
    {
        return $this->head == $this->tail;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->tail = ($this->tail - 1 + $this->count) % $this->count;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->head];
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        return $this->queue[($this->tail - 1 + $this->count) % $this->count];
    }
}