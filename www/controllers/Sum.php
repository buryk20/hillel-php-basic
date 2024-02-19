<?php

namespace controllers;

class Sum extends Controller
{
    public function sum():void
    {
        // Аналогично бараузер ругается POST http://localhost/requests 404 (Not Found) но работает
        if (!empty($_POST['num1']) && !empty($_POST['num2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];

            $result = $num1 + $num2;

            header('Content-Type: application/json');
            echo json_encode(['result' => $result]);
        } else {

            http_response_code(400);
            echo json_encode(['error' => 'Необходимо передать два числа']);
        }
    }

}