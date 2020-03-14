<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s)
    {
        $max = 0;
        $dp = [];
        for ($i = 0; $i < strlen($s); $i++) {
            $dp[$i] = 0;
            if ($s{$i} == ")") {
                $pre = $i - 1 - (isset($dp[$i - 1]) ? $dp[$i - 1] : 0);
                if ($pre >= 0 && $s{$pre} == "(") {
                    $dp[$i] = $dp[$i - 1] + 2 + (isset($dp[$pre - 1]) ? $dp[$pre - 1] : 0);
                }
            }
            $max = max($max, $dp[$i]);
        }
        return $max;
    }
}

mock();
function mock()
{
    echo "======== test case start ======\n";
    echo (new Solution())->longestValidParentheses("()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses("(()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses("((())()()()()");
    echo "\n";
    echo "======== test case end =========";
}