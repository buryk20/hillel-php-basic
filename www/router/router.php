<?php
require_once APP_DIR . '/vendor/autoload.php';
require_once APP_DIR . '/class/ToDoList.php';

$path = APP_DIR . '/file/toDoList.json';
$toDoList = new ToDoList($path);

$router = new \Bramus\Router\Router();

$router->get('/', function() {
    include APP_DIR . '/path/home.php';
});

$router->get('/to-do-list', function() {
    include APP_DIR . '/path/to-do-list.php';
});


//Тут сделано на скорую руку, конечно можно реализовать это по красевее и более превельней
$router->post('/api/to-do-list', function() use ($toDoList) {
    $data = json_decode(file_get_contents("php://input"), true);


    if (isset($data["title"]) && isset($data["priority"])) {
        $title = $data["title"];
        $priority = $data["priority"];

        // Создаем экземпляр класса ToDoList


        // Добавляем задачу
        $toDoList->addTask($title, $priority);

    } else {
        http_response_code(400);
    }
});

$router->post('/api/to-do-list/del', function() use ($toDoList) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["id"])) {
        $idToDelete = $data['id'];

        // Удаляекм задачу
        $toDoList->deleteTask($idToDelete);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => "Элемент успешно удален $idToDelete"]);
        exit();
    } else {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Не удалось получить идентификатор из запроса']);
        exit();
    }
});

$router->run();