<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s)
    {
        $arr = [];
        $stack = new SplStack();
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s{$i} == "(") {
                $stack->push($i);
            }
            if ($s{$i} == ")") {
                if ($stack->isEmpty()) {
                    $arr[] = $i;
                } else {
                    $stack->pop();
                }
            }
        }
        while (!$stack->isEmpty()) {
            $arr[] = $stack->pop();
        }
        $str = "";
        for ($i = 0; $i < strlen($s); $i++) {
            if (!in_array($i, $arr)) {
                $str .= $s{$i};
            }
        }
        return $str;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $ret = (new Solution())->minRemoveToMakeValid("lee(t(c)o)de)");
    var_dump($ret);
    $ret = (new Solution())->minRemoveToMakeValid("a)b(c)d");
    var_dump($ret);
    $ret = (new Solution())->minRemoveToMakeValid("))((");
    var_dump($ret);
    $ret = (new Solution())->minRemoveToMakeValid("(a(b(c)d)");
    var_dump($ret);
    echo "======= test case end =======\n";
}