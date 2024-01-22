<?php
require_once APP_DIR . '/vendor/autoload.php';
require_once APP_DIR . '/class/ToDoList.php';

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    include APP_DIR . '/path/home.php';
});

$router->get('/to-do-list', function() {
    include APP_DIR . '/path/to-do-list.php';
});

$router->post('/api/to-do-list', function() {
    $data = json_decode(file_get_contents("php://input"), true);
    $path = APP_DIR . '/file/toDoList.json';

    // Проверяем, что данные присутствуют и имеют нужные ключи
    if (isset($data["title"]) && isset($data["priority"])) {
        $title = $data["title"];
        $priority = $data["priority"];

        // Создаем экземпляр класса ToDoList
        $toDoList = new ToDoList($path);

        // Добавляем задачу
        $toDoList->addTask($title, $priority);

        // Возвращаем какой-то ответ клиенту
        echo "Данные успешно получены на сервере";
    } else {
        // Возвращаем ошибку, если данные не соответствуют ожидаемым
        http_response_code(400); // Bad Request
        echo "Ошибка в данных запроса";
    }
});

$router->run();