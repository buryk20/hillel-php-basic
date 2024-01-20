<?php
$num = 10;
$numSec = 15;
function multiplication(int $num, int $numSec, Closure $function = null) {
    $res = $num*$numSec;
    if(!is_null($function)) {
        $function($res);
    }
    return $res;
}

$funPrint = function ($res) {
    echo "$res" . PHP_EOL;
};

echo multiplication($num, $numSec, $funPrint);