<?php

class Response
{

    public static function redirect(string $url, ?int $code = 302): never
    {
        header("Location: $url", true, $code);
        exit;
    }
}