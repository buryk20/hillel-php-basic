<?php

//1. Написати програму на PHP, яка містить користувацьку функцію для обчислення площі кола та демонструє використання передачі даних у функцію за допомогою параметрів.
//2. Написати програму на PHP, яка приймає число і підносить його до ступеню
define("NUMBER_PI", 3.14159);
$radius = 10;
function areaCircle(int|float $radius, float $pi) {
    return $pi*pow($radius, 2);
}

$areaCircle = round(areaCircle($radius, NUMBER_PI), 2);

echo $areaCircle . PHP_EOL;

//3. Використайте функцію в двох варіантах: коли вона повертає нове число і змінює передане.
$number = 12;
function retNumberLink(&$num) {
    $num = $num + 5;
    return $num + 10;
}

retNumberLink($number);

echo $number . PHP_EOL;
echo retNumberLink($number);