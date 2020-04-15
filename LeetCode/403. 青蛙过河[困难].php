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

    private $memo = [];

    function canCross_2($stones)
    {
        for ($i = 0; $i <= count($stones); $i++) {
            $this->memo[] = array_fill(0, count($stones), -1);
        }
        return $this->helper_2($stones, 0, 0) == 1;
    }

    function helper_2($stones, $k, $cur)
    {
        if ($this->memo[$cur][$k] >= 0) {
            return $this->memo[$cur][$k];
        }
        for ($i = $cur + 1; $i < count($stones); $i++) {
            $gap = $stones[$i] - $stones[$cur];
            if ($gap >= $k - 1 && $gap <= $k + 1) {
                if ($this->helper($stones, $gap, $i)) {
                    $this->memo[$cur][$gap] = 1;
                    return 1;
                }
            }
        }
        $this->memo[$cur][$k] = ($cur == count($stones) - 1) ? 1 : 0;
        return $this->memo[$cur][$k];
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->canCross([0, 1, 3, 5, 6, 8, 12, 17])) . "\n";
    var_dump((new Solution())->canCross([0, 1, 2, 3, 4, 8, 9, 11])) . "\n";

    var_dump((new Solution())->canCross_2([0, 1, 3, 5, 6, 8, 12, 17])) . "\n";
    var_dump((new Solution())->canCross_2([0, 1, 2, 3, 4, 8, 9, 11])) . "\n";
    echo "======= test case end =======\n";
}