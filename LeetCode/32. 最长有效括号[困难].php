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
                $pre = $i - ($dp[$i - 1] ?? 0) - 1;
                if (isset($dp[$pre]) && $s{$pre} == "(" && $dp[$pre] >= 0) {
                    $dp[$i] = $dp[$i - 1] + $dp[$pre - 1] + 2;
                }
            }
            $max = max($max, $dp[$i]);
        }
        return $max;
    }

    function longestValidParentheses2($s)
    {
        $left = 0;
        $right = 0;
        $max = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s{$i} == "(") {
                $left++;
            } else {
                $right++;
            }
            if ($left == $right) {
                $max = max($max, $left * 2);
            }
            if ($right > $left) {
                $left = $right = 0;
            }
        }
        $left = $right = 0;
        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            if ($s{$i} == "(") {
                $left++;
            } else {
                $right++;
            }
            if ($left == $right) {
                $max = max($max, $right * 2);
            }
            if ($left > $right) {
                $left = $right = 0;
            }

        }
        return $max;
    }
}

mock();
function mock()
{
    echo "======== test case start ======\n";
    echo (new Solution())->longestValidParentheses(")(");
    echo "\n";
    echo (new Solution())->longestValidParentheses("()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses("(()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses("((())()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses2("()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses2("(()()()()()");
    echo "\n";
    echo (new Solution())->longestValidParentheses2("((())()()()()");
    echo "\n";
    echo "======== test case end =========";
}