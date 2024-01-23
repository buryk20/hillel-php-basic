<?php
require_once APP_DIR . '/class/ToDoList.php';
$linkFile = APP_DIR . '/file/toDoList.json';
$toDoList = new ToDoList($linkFile);

$toDoList->statusChange('65afd7480cfd1', 'виконано');
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
        <h1>Home page</h1>
    </main>
    <script type="module" src="./assets/index.js"></script>
</body>
</html>
