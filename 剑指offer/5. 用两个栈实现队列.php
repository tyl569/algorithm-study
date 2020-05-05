<?php


$inStack = new SplStack();
$outStack = new SplStack();


function mypush($node)
{
    global $inStack;
    $inStack->push($node);
}

function mypop()
{
    global $outStack;
    global $inStack;
    if ($outStack->isEmpty()) {
        while (!$inStack->isEmpty()) {
            $outStack->push($inStack->pop());
        }
    }


    return $outStack->pop();
}

mypush(1);
mypush(2);
mypush(3);
echo mypop() . "\n";
echo mypop() . "\n";
mypush(4);
mypush(5);
echo mypop() . "\n";
echo mypop() . "\n";