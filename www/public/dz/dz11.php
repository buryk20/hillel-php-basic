<?php
//1. Написати програму на PHP, яка приймає з консолі аргументи, які введені, і записує їх в файл
require_once('./index.php');
$filePath =  APP_DIR . "/database/data.txt";
$data = inputVal();

function inputVal(): string
{
    echo 'Введите данные' . PHP_EOL;
    $input = fgets(STDIN);

    return $input;
}

function writeToFile(string $data, string $filePath)
{
    $data = date("Y-m-d H:i:s") . ' dz11.php' . $data;
    file_put_contents($filePath, $data, FILE_APPEND);
}

//2. Написати іншу програму, яка виводить з файлу логу останні аргументи попередньої програми, які були введені.

function outputData(string $filePath): string
{
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    return end($lines);
}

writeToFile($data, $filePath);
echo outputData($filePath);

