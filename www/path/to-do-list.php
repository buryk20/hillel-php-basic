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
    <link rel="stylesheet" href="/assets/css/main.css">
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
        <form class="form-wrp" id="toDoForm">
            <div class="form-item-wrp">
                <div class="form-input-wrp">
                    <label for="title">Name:</label>
                    <input class="form-input" type="text" id="title" name="title" required>
                </div>
                <div class="form-input-wrp">
                    <label for="priority">Priority:</label>
                    <input class="form-input" type="text" id="priority" name="priority" required>
                </div>
            </div>
            <button class="form-btn" type="button" data-btn-form>Отправить</button>
        </form>
        <h2>
            Table
        </h2>
        <?php
            if ($dataArray !== null) {
                // Отрисовываем данные
                echo '<table border="1">';
                echo '<tr><th>ID</th><th>Name</th><th>Priority</th><th>Status</th><th>Delete</th></tr>';

                foreach ($dataArray as $item) {
                    echo '<tr>';
                    echo "<td data-id={$item['id']} >" . $item['id'] . '</td>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['priority'] . '</td>';
                    echo '<td>' . $item['status'] . '</td>';
                    echo '<td data-btn-del class="btn-del">' . 'Delete' . '</td>';
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