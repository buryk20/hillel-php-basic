<?php
$linkFile = APP_DIR . '/file/toDoList.json';
$jsonData = file_get_contents($linkFile);

$dataArray = json_decode($jsonData, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th {
            padding: 4px 12px;
        }
    </style>
</head>
<body>
    <?php require_once 'header.php'; ?>
    <main>
        <h1>To do list</h1>
        <form style="margin-top: 40px;" id="toDoForm">
            <label for="title">Название:</label>
            <input style="margin-bottom: 24px;" type="text" id="title" name="title" required>
            <br>
            <label for="priority">Приоритет:</label>
            <input style="margin-bottom: 24px;" type="text" id="priority" name="priority" required>
            <br>
            <button style="margin-bottom: 40px;" type="button" data-btn-form>Отправить</button>
        </form>
        <?php
            if ($dataArray !== null) {
                // Отрисовываем данные
                echo '<table border="1">';
                echo '<tr><th>ID</th><th>Name</th><th>Priority</th><th>Status</th></tr>';

                foreach ($dataArray as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['id'] . '</td>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['priority'] . '</td>';
                    echo '<td>' . $item['status'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo 'Ошибка декодирования JSON.';
            }
        ?>
    </main>
    <script type="module" src="./assets/index.js"></script>
</body>
</html>