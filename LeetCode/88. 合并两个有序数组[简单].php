<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        if (empty($nums2)) {
            return $nums1;
        }
        $i = 0;
        $j = 0;
        $new = [];
        while ($i < $m && $j < $n) {
            // 如果发现$nums1的元素比前一个元素小，break
            if (isset($nums1[$i]) && $nums1[$i - 1] > $nums1[$i]) {
                break;
            }
            if ($nums1[$i] < $nums2[$j]) {
                $new[] = $nums1[$i];
                $i++;
            } else {
                $new[] = $nums2[$j];
                $j++;
            }
        }

        while ($j < $n) {
            $new[] = $nums2[$j];
            $j++;
        }

        while ($i < $m) {
            $new[] = $nums1[$i];
            $i++;
        }

        $nums1 = $new;
        return $nums1;
    }

    function merge2(&$nums1, $m, $nums2, $n)
    {
        if (empty($nums2)) {
            return $nums1;
        }
        $i = $m - 1;
        $j = $n - 1;
        $end = ($m + $n) - 1;
        while ($i >= 0 && $j >= 0) {
            if ($nums1[$i] > $nums2[$j]) {
                $nums1[$end] = $nums1[$i];
                $i--;
            } else {
                $nums1[$end] = $nums2[$j];
                $j--;
            }
            $end--;
        }
        while ($j >= 0) {
            $nums1[$j] = $nums2[$j];
            $j--;
        }
        return $nums1;
    }
}

$nums1 = [1, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
$ret = (new Solution())->merge2($nums1, 3, $nums2, 3);
var_dump($ret);

$nums1 = [0, 2, 3, 0, 0, 0];
$nums2 = [2, 5, 6];
$ret = (new Solution())->merge2($nums1, 3, $nums2, 3);
var_dump($ret);

$nums1 = [2, 0];
$nums2 = [1];
$ret = (new Solution())->merge2($nums1, 1, $nums2, 1);
var_dump($ret);

