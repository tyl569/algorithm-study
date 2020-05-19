<?php

class Solution
{

    /**
     * @param Integer[] $postorder
     * @return Boolean
     *
     * [1, 3, 2, 6, 5]
     *
     */
    function verifyPostorder($postorder)
    {
        return $this->helper($postorder, 0, count($postorder) - 1);
    }

    function helper($postorder, $i, $j)
    {
        if ($i > $j) {
            return true;
        }
        $p = $i;
        while ($postorder[$p] < $postorder[$j]) {
            $p++;
        }
        $m = $p;
        while ($postorder[$p] > $postorder[$j]) {
            $p++;
        }
        return $p == $j && $this->helper($postorder, $i, $m - 1) && $this->helper($postorder, $m, $j - 1);
    }

    function verifyPostorder_2($postorder)
    {
        $stack = new SplStack();
        $root = PHP_INT_MAX;
        for ($i = count($postorder) - 1; $i >= 0; $i--) {
            if ($postorder[$i] > $root) {
                return false;
            }
            while (!$stack->isEmpty() && $stack->top() > $postorder[$i]) {
                $root = $stack->pop();
            }
            $stack->push($postorder[$i]);
        }
        return true;
    }
}


mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump(
        (new Solution())->verifyPostorder([1, 3, 2, 6, 5])
    );

    echo "======= test case end =======\n";
}