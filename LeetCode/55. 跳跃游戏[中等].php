<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $lastPos = count($nums) - 1;
        for ($i = count($nums) - 1; $i >= 0; $i--) {
            if ($i + $nums[$i] >= $lastPos) {
                $lastPos = $i;
            }
        }
        return $lastPos == 0;

    }

    function canJump_2($nums)
    {
        return $this->helper_2($nums, 0);
    }

    function helper_2($nums, $pos)
    {
        if ($pos >= count($nums) - 1) {
            return true;
        }
        $furthestJump = min($pos + $nums[$pos], count($nums) - 1);
        for ($nextPost = $pos + 1; $nextPost <= $furthestJump; $nextPost++) {
            if ($this->helper_2($nums, $nextPost)) {
                return true;
            }
        }
        return false;
    }

    private $memo = [];// 用来记录

    function canJump_3($nums)
    {
        $this->memo[count($nums) - 1] = 1;
        return $this->helper_3($nums, 0);
    }

    function helper_3($nums, $pos)
    {
        if ($this->memo[$pos] == 1) {
            return true;
        }
        if ($this->memo[$pos] == 2) {
            return false;
        }
        $furthestJump = min($pos + $nums[$pos], count($nums) - 1);
        for ($nextPost = $pos + 1; $nextPost <= $furthestJump; $nextPost++) {
            if ($this->helper_3($nums, $nextPost)) {
                $this->memo[$pos] = 1;
                return true;
            }
        }
        $this->memo[$pos] = 2;
        return false;

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $ret = (new Solution())->canJump([2, 3, 1, 1, 4]);
    var_dump($ret);
    $ret = (new Solution())->canJump([3, 2, 1, 0, 4]);
    var_dump($ret);

    $ret = (new Solution())->canJump_2([2, 3, 1, 1, 4]);
    var_dump($ret);
    $ret = (new Solution())->canJump_2([3, 2, 1, 0, 4]);
    var_dump($ret);

    $ret = (new Solution())->canJump_3([2, 3, 1, 1, 4]);
    var_dump($ret);
    $ret = (new Solution())->canJump_3([3, 2, 1, 0, 4]);
    var_dump($ret);
    echo "======= test case end =======\n";
}