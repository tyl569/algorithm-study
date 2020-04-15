<?php

class Solution
{

    /**
     * @param Integer[] $stones
     * @return Boolean
     */
    function canCross($stones)
    {
        return $this->helper($stones, 0, 0);
    }

    function helper($stones, $k, $cur)
    {
        for ($i = $cur + 1; $i < count($stones); $i++) {
            $gap = $stones[$i] - $stones[$cur];
            if ($gap >= $k - 1 && $gap <= $k + 1) {
                if ($this->helper($stones, $gap, $i)) {
                    return true;
                }
            }
        }
        return $cur == count($stones) - 1;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->canCross([0, 1, 3, 5, 6, 8, 12, 17])) . "\n";
    var_dump((new Solution())->canCross([0, 1, 2, 3, 4, 8, 9, 11])) . "\n";
    echo "======= test case end =======\n";
}