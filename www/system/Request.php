<?php

class Request
{
    public static function getUrl(): string
    {
        $url = $_SERVER['REQUEST_URI'];

        if (str_contains($url, '?')) {
            //todo put get params to property class
            $url = substr($url, 0, strpos($url, '?'));
        }

        return $url;
    }
    public static function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function getReferer(): string
    {
        return $_SERVER['HTTP_REFERER'] ?? '';
    }

    public static function get(string $key, $mode = 'string'): mixed
    {
        $data = [];
        if (self::getMethod() === 'post') {
            $data = $_POST;
        } elseif (self::getMethod() === 'get') {
            $data = $_GET;
        }

        $value = $data[$key] ?? null;

        if ($value !== null) {

            if ($mode === 'int') {
                $value = intval($value);
            }

            $value = preg_replace("/<script.*?<\/script>/", '', $value);
            $value = htmlspecialchars($value);
        }

        return $value;
    }
}