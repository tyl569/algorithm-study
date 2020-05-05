<?php

/**
 * @param $rotateArray
 * @return mixed
 *
 *
 * 题目描述
 * 把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。
 * 输入一个非递减排序的数组的一个旋转，输出旋转数组的最小元素。
 * 例如数组{3,4,5,1,2}为{1,2,3,4,5}的一个旋转，该数组的最小值为1。
 * NOTE：给出的所有元素都大于0，若数组大小为0，请返回0。
 *
 *
 */
function minNumberInRotateArray($rotateArray)
{
    if (count($rotateArray) == 0) {
        return 0;
    }
    $start = 0;
    $end = count($rotateArray) - 1;
    while ($start < $end) {
        $mid = ($start + $end) >> 1;

        // 如果数组元素允许重复，
        // 会出现一个特殊的情况：nums[l] == nums[m] == nums[h]，
        // 此时无法确定解在哪个区间，
        // 需要切换到顺序查找。
        // 例如对于数组 {1,1,1,0,1}，start、mid 和 end 指向的数都为 1，此时无法知道最小数字 0 在哪个区间。
        if (($rotateArray[$start] == $rotateArray[$mid]) && ($rotateArray[$end] == $rotateArray[$mid])) {
            return minNumer($rotateArray, $start, $end);

            // 如果中间元素，比结尾的与元素大，说明 $start ~ $min 是递增的，
            // 所以最小的值，应该在$mid的右侧
            // 所以在右半部分进行查找
        } else if ($rotateArray[$mid] >= $rotateArray[$end]) {
            $start = $mid + 1;
        } else {
            $end = $mid;
        }
    }
    return $rotateArray[$start];
}

function minNumer($arr, $start, $end)
{
    for ($i = $start; $i <= $end; $i++) {
        if ($arr[$i] > $arr[$i + 1]) {
            return $arr[$i + 1];
        }
    }
    return $arr[$start];
}

echo minNumberInRotateArray([3, 4, 5, 1, 2]) . "\n";
echo minNumberInRotateArray([1, 1, 1, 0, 1]) . "\n";


