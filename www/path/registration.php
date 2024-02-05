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
        <h1>Registration</h1>
        <!-- <form id="registrationForm">
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="button" onclick="submitForm()">Зареєструватися</button>
        </form> -->
        <form class="form-wrp" id="registrationForm">
            <div class="form-item-wrp">
                <div class="form-input-wrp">
                    <label for="username">Name:</label>
                    <input class="form-input" type="text" id="username" name="username" required>
                </div>
                <div class="form-input-wrp">
                    <label for="priority">Email:</label>
                    <input class="form-input" type="email" id="email" name="email" required>
                </div>
                <div class="form-input-wrp">
                    <label for="priority">Password:</label>
                    <input class="form-input" type="password" id="password" name="password" required>
                </div>
            </div>
            <button class="form-btn" type="button" data-btn-form>Отправить</button>
        </form>
    </main>
    <script type="module" src="./assets/index.js"></script>
</body>
</html>
