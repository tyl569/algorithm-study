<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    private $result = [];

    function jump($nums)
    {
        $ans = $start = 0;
        $end = 1;
        while ($end < count($nums)) {
            $maxPost = 0;
            for ($i = $start; $i < $end; $i++) {
                $maxPost = max($maxPost, $i + $nums[$i]);
            }
            $start = $end;
            $end = $maxPost + 1;
            $ans++;
        }
        return $ans;
    }


    function jump_2($nums)
    {
        $this->helper($nums, 0, []);
        return min($this->result);
    }

    function helper($nums, $pos, $list)
    {
        if ($pos == count($nums) - 1) {
            $this->result[] = count($list);
            return;
        }
        $furthest = min($pos + $nums[$pos], count($nums) - 1);
        for ($nextPost = $pos + 1; $nextPost <= $furthest; $nextPost++) {
            $list[] = $pos;
            $this->helper($nums, $nextPost, $list);
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->jump([2, 3, 1, 1, 4]));
    var_dump((new Solution())->jump_2([2, 3, 1, 1, 4]));

    echo "======= test case end =======\n";
}