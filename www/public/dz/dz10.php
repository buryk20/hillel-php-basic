<?php

function fibonacciGenerator($numEnd)
{
    $numFirst = 0;
    $numSec = 1;
    while($numFirst <= $numEnd) {
        yield $numFirst;
        [$numFirst, $numSec] = [$numSec, $numFirst + $numSec];
    }
}

$numEnd = 5;

foreach(fibonacciGenerator($numEnd) as $value) {
    echo $value . " ";
}