<?php

namespace controllers;

class ShowHello extends Controller
{
    public  function hello(): void
    {
        // Вывел страницу, но браузер почему то ругается GET http://localhost/requests 404 (Not Found) но работает, может подскажите что не так сделал
        include APP_DIR . '/path/requests.php';
        echo 'Hello';
    }
}