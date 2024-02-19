<?php

require_once APP_DIR . '/database/Connector.php';
class UserSearchHandler
{
    public static function handleSearchRequest()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $email = $data['email'] ?? null;

        if (!isset($email)) {
            http_response_code(400); // Встановлюємо код помилки
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            exit();
        }

        try {
            $pdo = Connector::getInstance();

            // Перевірка, чи існує користувач з такою поштою
            $stmt = $pdo->prepare("SELECT * FROM `users` WHERE email = ?");
            $stmt->execute([$email]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Якщо користувача з такою поштою не знайдено, генеруємо помилку
            if (!$userData) {
                throw new Exception('User not found');
            }

            // Повертаємо успішну відповідь на фронт
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'data' => $userData]);
            exit();
        } catch (PDOException $e) {
            // Обробка помилки під час роботи з базою даних
            http_response_code(500); // Встановлюємо код помилки сервера
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
            exit();
        } catch (Exception $e) {
            // Обробка інших помилок
            http_response_code(500); // Встановлюємо код помилки сервера
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
            exit();
        }
    }
}