<?php

class Solution
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    private $result = [];

    function combinationSum2($candidates, $target)
    {
        sort($candidates);
        $this->helper($candidates, $target, [], 0);
        return $this->result;
    }

    public function helper($candidates, $target, $list, $start)
    {
        if ($target == 0) {
            $this->result[] = $list;
            return;
        }
        for ($i = $start; $i < count($candidates); $i++) {
            if ($target - $candidates[$i] < 0) {
                break;
            }
            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }
            $list[] = $candidates[$i];
            // 因为元素不能重复使用，所以传递下的值是i+1而不是i
            $this->helper($candidates, $target - $candidates[$i], $list, $i + 1);
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->combinationSum2([10, 1, 2, 7, 6, 1, 5], 8));


    echo "======= test case end =======\n";
}