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
        <form data-form-reg class="form-wrp" id="registrationForm">
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
            <button data-btn-form-reg class="form-btn" type="button" data-btn-form>Отправить</button>
        </form>
        <hr>
        <form data-wrp-search class="form-wrp wrp-search-form">
            <div class="form-item-wrp">
                <div class="form-input-wrp">
                    <label for="username">Enter email:</label>
                    <input class="form-input" type="text" id="emailSearch" name="emailSearch" required>
                </div>
            </div>
            <button data-btn-form-search class="form-btn" type="button" >Отправить</button>
        </form>
        <p id="userDataContainer"></p>
    </main>
    <script type="module" src="./assets/index.js"></script>
</body>
</html>
