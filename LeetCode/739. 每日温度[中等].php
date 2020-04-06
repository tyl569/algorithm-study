<?php

class Solution
{

    /**
     * @param Integer[] $T
     * @return Integer[]
     */
    function dailyTemperatures($T)
    {
        $ans = [];
        $stack = new SplStack();

        for ($i = count($T) - 1; $i >= 0; $i--) {
            while (!$stack->isEmpty() && $T[$i] >= $T[$stack->top()]) {
                $stack->pop();
            }
            $ans[$i] = $stack->isEmpty() ? 0 : $stack->top() - $i;
            $stack->push($i);
        }
//        return $ans;
        return array_reverse($ans);
    }
}

mock();
function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->dailyTemperatures([73, 74, 75, 71, 69, 72, 76, 73]));
    echo "======= test case end =======\n";
}