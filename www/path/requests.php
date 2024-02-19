<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
    <?php require_once 'header.php'; ?>
    <main>
        <h1>Requests</h1>

        <h2>Отправка данных на сервер</h2>
        <form id="dataForm">
            <label for="num1">Число 1:</label>
            <input type="number" id="num1" name="num1" required><br><br>
            <label for="num2">Число 2:</label>
            <input type="number" id="num2" name="num2" required><br><br>
            <button type="submit">Отправить</button>
        </form>

        <div id="result"></div>
    </main>
    <script type="module" src="./assets/index.js"></script>
</body>
</html>
