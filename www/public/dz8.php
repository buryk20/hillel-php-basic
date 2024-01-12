<?php

//Импортирую функцию randomArr из дз7
include './dz7.php';

//Створити пустий масив і заповнити його випадковими значенняит.
$arr = [];
$min = 0;
$max = 20;
$lengthArr = 10;
$arr = randomArr($min, $max, $lengthArr);

//Порахувати суму елементів масиву.
$sumArr = array_sum($arr);

//Порахувати добуток всіх елементів масиву.
$prodArr = array_product($arr);

//Перевірте скільки раз число 5 зустрічається у вас в масиві.
$param = 5;

function checkHowManyValuesArr(array $arr, $param)
{
    $newArr = array_keys($arr, $param);
    return count($newArr);
}

checkHowManyValuesArr($arr, $param);

//Виведіть на екран тільки числа, які націло діляться на 3.
$divider = 3;
function checkDivisionWithoutRemainder(array $arr, int $par)
{
    $newArr = [];
    foreach($arr as $v) {
        if($v % $par === 0) {
            array_push($newArr, $v);
        }
    }

    return $newArr;
}

echo "Цифры которые делятся без остатка на $divider = " . join(", ", checkDivisionWithoutRemainder($arr, $divider));