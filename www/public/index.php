<?php

require_once '../system/constants.php';
require_once APP_DIR . '/autoloader.php';
require_once APP_DIR . '/class/FileWriter.php';
require_once APP_DIR . '/class/ToDoList.php';
require_once APP_DIR . '/server/processing-request.php';
require_once APP_DIR . '/router/router.php';
require_once APP_DIR . '/class/bankAccount.php';
require_once APP_DIR . '/class/Text.php';

require_once APP_DIR . '/class/abstract/Rectangle.php';
require_once APP_DIR . '/class/abstract/Circle.php';

require_once APP_DIR . '/class/treats/Doo.php';
require_once APP_DIR . '/class/treats/DooSec.php';

$linkLogs = APP_DIR . '/logs/logs.txt';
$linkFile = APP_DIR . '/file/toDoList.json';
//Создаю экземпляр класса, что бы отлавливать логи и записывать их в фаил
try {
    $fileWriter = new FileWriter($linkLogs);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
// Обрабатываю ошибку если файла по указанному пути нет, и записываю в логи
try {
    $toDoList = new ToDoList($linkFile);
} catch (Exception $e) {
    $fileWriter->writeToFileWith('Error: ' . $e->getMessage() . '. ' . 'Path to the file: ' . $linkFile);
}

$bankAccount = new BankAccount('123', '500');

// try {
//     $bankAccount->refill(-100);
// } catch(Exception $e) {
//     echo $e->getMessage();
// }

// try {
//     $bankAccount->withdrawMoney(300);
// } catch(Exception $e) {
//     echo $e->getMessage();
// }

// try {
//     $rectangle = new Rectangle(10, 50);
//     echo $rectangle->getLength();
//     echo $rectangle->getWidth() . "</br>";
//     $rectangle->getArea();
//     echo "</br>";
//     $rectangle->getPerimeter();
// } catch(Exception $e) {
//     echo $e->getMessage();
// }

// try {
//     $circle = new Circle(20);
//     echo $circle->getRadius();
//     echo "</br>";
//     $circle->getPerimeter();
//     $circle->getArea();
// } catch(Exception $e) {
//     echo $e->getMessage();
// }


try {
    $doo = new Doo(10, 5);
    $doo->multiplication();
} catch(Exception $e) {
    echo $e->getMessage();
}

echo "</br>";

try {
    $dooSec = new DooSec(10, 5);
    $dooSec->division();
} catch(Exception $e) {
    echo $e->getMessage();
}
