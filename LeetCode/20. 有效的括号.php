<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $stack = new SplStack();
        $i = 0;
        while ($i < strlen($s)) {
            if ($stack->isEmpty() && ($s{$i} == "]" || $s{$i} == "}" || $s{$i} == ")" )) {
                return false;
            }
            if (!$stack->isEmpty() && $s{$i} == "}" && $stack->top() == "{") {
                $stack->pop();
            } elseif (!$stack->isEmpty() && $s{$i} == "]" && $stack->top() == "[") {
                $stack->pop();
            } elseif (!$stack->isEmpty() && $s{$i} == ")" && $stack->top() == "(") {
                $stack->pop();
            } else {
                $stack->push($s{$i});
            }
            $i++;
        }
        return $stack->isEmpty();
    }
}

$ret = (new Solution())->isValid("(])");
var_dump($ret);

$ret = (new Solution())->isValid("()");
var_dump($ret);


$ret = (new Solution())->isValid("()[]{}");
var_dump($ret);


$ret = (new Solution())->isValid("(]");
var_dump($ret);


$ret = (new Solution())->isValid("([)]");
var_dump($ret);

$ret = (new Solution())->isValid("]]]]");
var_dump($ret);


$ret = (new Solution())->isValid("[[[[");
var_dump($ret);
