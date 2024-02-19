<?php
require_once APP_DIR . '/vendor/autoload.php';
require_once APP_DIR . '/class/ToDoList.php';
require_once APP_DIR . '/database/Connector.php';
require_once APP_DIR . '/class/UserSearchHandler.php';

$path = APP_DIR . '/file/toDoList.json';
$toDoList = new ToDoList($path);

$router = new \Bramus\Router\Router();

//$router->addRouter('/test', [
//
//]);

$router->get('/', function() {
    include APP_DIR . '/path/home.php';
});

$router->get('/to-do-list', function() {
    include APP_DIR . '/path/to-do-list.php';
});


$router->get('/registration', function() {
    include APP_DIR . '/path/registration.php';
});

//Тут сделано на скорую руку, конечно можно реализовать это по красевее и более превельней
$router->post('/api/to-do-list', function() use ($toDoList) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["title"]) && isset($data["priority"])) {
        $title = $data["title"];
        $priority = $data["priority"];

        // Добавляем задачу
        $toDoList->addTask($title, $priority);
        exit();
    } else {
        header('Content-Type: application/json');
        http_response_code(400);
        exit();
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

$router->post('/api/to-do-list/status', function() use ($toDoList) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["id"])) {
        $idToDelete = $data['id'];
        $status =  $data['status'];

        // Удаляекм задачу
        $toDoList->statusChange($idToDelete, $status);

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

$router->post('/api/to-do-list/sort', function() use ($toDoList) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (empty($_POST) && empty($_FILES)) {
        // Пустой POST-запрос обработан успешно

        $toDoList->getTasks();
        $response = ['success' => true, 'message' => 'Empty POST request processed successfully'];
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // Обработка ошибки, если запрос не соответствует ожиданиям
        $response = ['success' => false, 'message' => 'Invalid or non-empty POST request'];
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode($response);
    }
});

$router->post('/api/registration', function() {
    $data = json_decode(file_get_contents("php://input"), true);

    $username = $data['username'] ?? null;
    $email = $data['email'] ?? null;
    $password = $data['password'] ?? null;

    if (!isset($username, $email, $password)) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Missing required fields']);
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $pdo = Connector::getInstance();

        // Перевірка, чи існує користувач з такою поштою
        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            // Якщо користувач з такою поштою вже існує, повертаємо відповідь про помилку на фронт
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'User with this email already exists']);
            exit();
        }

        // Якщо користувача з такою поштою не знайдено, реєструємо нового користувача
        $stmt = $pdo->prepare("INSERT INTO `users` (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword]);

        // Повертаємо успішну відповідь на фронт
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'User registered successfully']);
        exit();
    } catch (PDOException $e) {
        // В разі виникнення помилки повертаємо відповідь з помилкою на фронт
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Failed to register user: ' . $e->getMessage()]);
        exit();
    }
});

$router->post('/api/registration/search', 'UserSearchHandler::handleSearchRequest');

$router->run();