<?php

//Виведіть на екран всі числа від 1 до 10 використовуючи цикл while
$i = 1;
$count = 10;

while ($i <= $count) {
    echo $i++ . PHP_EOL;
}

//Обчисліть факторіал числа 5 використовуючи цикл while.

$number = 5;
$factorial = 1;
$countFac = 1;

while ($countFac <= $number) {
    $factorial *= $countFac;
    $countFac++;
}

echo $factorial . PHP_EOL;

//Виведіть на екран всі парні числа від 1 до 20 використовуючи цикл while.

$numStart =  1;
$numEnd = 20;

while ($numStart <= $numEnd) {
    if($numStart % 2 === 0) {
        echo $numStart . PHP_EOL;
    }
    $numStart++;
}