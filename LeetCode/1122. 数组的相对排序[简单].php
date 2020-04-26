<?php

class Solution
{

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2)
    {
        $count1 = count($arr1);
        $count2 = count($arr2);
        $hash = $out = [];
        # 建立hash并且统计次数
        for ($i = 0; $i < $count1; $i++) {
            if (isset($hash[$arr1[$i]])) {
                $hash[$arr1[$i]] += 1;
            } else {
                $hash[$arr1[$i]] = 1;
            }
        }
        # 遍历arr2,装载数组,删除hash的key->val
        for ($i = 0; $i < $count2; $i++) {
            if (isset($hash[$arr2[$i]])) {
                for ($j = 0; $j < $hash[$arr2[$i]]; $j++) {
                    $out[] = $arr2[$i];
                }
                unset($hash[$arr2[$i]]);
            }
        }
        # hash排序
        ksort($hash);
        # 剩下的hash按照次数装载数组
        foreach ($hash as $key => $value) {
            for ($j = 0; $j < $value; $j++) {
                $out[] = $key;
            }
        }
        return $out;

    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    var_dump((new Solution())->relativeSortArray([2, 3, 1, 3, 2, 4, 6, 7, 9, 2, 19], [2, 1, 4, 3, 9, 6]));

    echo "======= test case end =======\n";
}