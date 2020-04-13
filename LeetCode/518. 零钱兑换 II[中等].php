<?php

class Solution
{

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
     */
    private $num = 0;

    function change($amount, $coins)
    {
        if ($amount == 0) {
            return 1;
        }
        if (empty($coins)) {
            return 0;
        }
        $dp[0] = 1;
        for ($j = 0; $j < count($coins); $j++) {
            for ($i = 1; $i <= $amount; $i++) {
                if ($i >= $coins[$j]) {
                    $dp[$i] = $dp[$i] + ($dp[$i - $coins[$j]] ?? 0);
                }

            }
        }
        return $dp[$amount];
    }


    function change_2($amount, $coins)
    {
        sort($coins);
        $this->helper($amount, [], $coins, 0);
        return $this->num;
    }

    function helper($amount, $list, $coins, $start)
    {
        if (0 == $amount) {
            $this->num++;
            return;
        }
        for ($i = $start; $i < count($coins); $i++) {
            if ($amount - $coins[$i] < 0) {
                break;
            }
            $list[] = $coins[$i];
            $this->helper($amount - $coins[$i], $list, $coins, $i);
            array_pop($list);
        }
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
//    var_dump((new Solution())->change_2(5, [1, 2, 5]));
//    var_dump((new Solution())->change_2(3, [2]));
//    var_dump((new Solution())->change_2(10, [10]));
    var_dump((new Solution())->change(5, [1, 2, 5]));
    var_dump((new Solution())->change(3, [2]));
    var_dump((new Solution())->change(10, [10]));
    echo "======= test case end =======\n";
}