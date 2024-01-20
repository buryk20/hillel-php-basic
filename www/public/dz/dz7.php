<?php

$min = 0;
$max = 50;
$lengthArr = 10;

function randomArr(int $min,int $max, $lengthArr) {
    $arr = [];

    for($i = 0; $i < $lengthArr; $i++) {
        $arr[$i] = mt_rand($min, $max);
    }

    return $arr;
}

function minVal(array $arr) {
    $min = $arr[0];
    foreach($arr as $value) {
        if($min >= $value) {
            $min = $value;
        }
    }
    return $min;
}
$newArr = randomArr($min, $max, $lengthArr);
$minVal = minVal($newArr);
$maxVal = max($newArr);
// что бы не забыть вот такой вопрос почему так делать нельзя, точней почему при такой записи показывается  не корректный результат?
// $maxVal = max(randomArr($min, $max, $lengthArr));

function sortCustom(array $arr, $param) {
    if($param === 'ascending') {
        asort($arr);
    } elseif ($param === 'descending') {
        arsort($arr);
    } else {
        echo 'Unknown parameter';
    }

    return $arr;
}

$arrAsc = sortCustom($newArr, 'ascending');
$arrDesc = sortCustom($newArr, 'descending');
