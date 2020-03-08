<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        if ($s{0} == ")" || $s{0} == "]" || $s{0} == "}") {
            return false;
        }
        $stack = new SplStack();
        $i = 0;
        while ($i < strlen($s)) {
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
