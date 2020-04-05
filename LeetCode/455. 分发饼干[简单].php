<?php

class Solution
{

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s)
    {
        sort($g);
        sort($s);
        $i = 0;
        $j = 0;
        $num = 0;
        while ($i < count($g) && $j < count($s)) {
            if ($g[$i] <= $s[$j]) {
                $i++;
                $j++;
                $num++;
            } else {
                $j++;
            }
        }
        return $num;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    echo (new Solution())->findContentChildren([1, 2, 3], [1, 1]) . "\n";
    echo (new Solution())->findContentChildren([1, 2], [1, 2, 3]) . "\n";
    echo "======= test case end =======\n";

}