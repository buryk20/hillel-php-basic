<?php
// Проверяем, что запрос был выполнен методом POST
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Получаем данные из тела запроса
//     $data = file_get_contents("php://input");

//     // Декодируем JSON-строку (если данные передаются в формате JSON)
//     $decodedData = json_decode($data, true);

//     // Выводим данные в консоль (или можем сохранить в файл, базу данных и т.д.)
//     print_r($decodedData);

//     // Возвращаем какой-то ответ клиенту
//     echo "Данные успешно получены на сервере.";
// } else {
//     // Возвращаем ошибку, если метод запроса не POST
//     http_response_code(405);
//     echo "Метод запроса не допускается.";
// }
?>
