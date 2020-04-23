<?php
/**
 * Created by PhpStorm.
 * User: tengyunlong
 * Date: 2020-04-23
 * Time: 22:12
 */

class Bit
{
    function test1()
    {
        for ($i = 0; $i <= 10000; $i++) {
            $i & 1;
        }
    }

    function test2()
    {
        for ($i = 0; $i <= 10000; $i++) {
            $i % 2;
        }
    }
}

mock();

function mock()
{
    $start = microtime(true);
    (new Bit())->test1();
    $end1 = microtime(true);
    (new Bit())->test2();
    $end2 = microtime(true);
    echo "位运算比取模快:" . abs(($end2 - $end1) - ($end1 - $start)) . "\n";
}