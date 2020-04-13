<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    // 让开始起跳的位置尽量大
    function jump($nums)
    {
        $start = 0;
        $end = 1;
        $ans = 0;
        while ($end <= count($nums) - 1) {
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

    private $step;

    function jump_2($nums)
    {
        $this->step = count($nums) - 1;
        $this->helper($nums, 0, 0);
        return $this->step;
    }

    function helper($nums, $pos, $step)
    {
        if ($pos >= count($nums) - 1) {
            $this->step = min($this->step, $step);
            return;
        }
        $further = min($pos + $nums[$pos], count($nums) - 1);
        for ($i = $pos + 1; $i <= $further; $i++) {
            $step++;
            $this->helper($nums, $i, $step);
            $step--;
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