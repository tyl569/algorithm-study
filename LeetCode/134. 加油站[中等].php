<?php

class Solution
{

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost)
    {
        $total = 0;
        $currentGas = 0;
        $startStation = 0;
        for ($i = 0; $i < count($gas); $i++) {
            $total += $gas[$i] - $cost[$i];
            $currentGas += $gas[$i] - $cost[$i];
            if ($currentGas < 0) {
                $startStation = $i + 1;
                $currentGas = 0;
            }
        }
        return $total >= 0 ? $startStation : -1;
    }
}

mock();

function mock()
{
    echo "======= test case start =======\n";
    $gas = [1, 2, 3, 4, 5];
    $cost = [3, 4, 5, 1, 2];
    echo (new Solution())->canCompleteCircuit($gas, $cost) . "\n";
    $gas = [1, 2, 4, 3, 5];
    $cost = [3, 4, 1, 5, 2];
    echo (new Solution())->canCompleteCircuit($gas, $cost) . "\n";


    echo "======= test case start =======\n";
}