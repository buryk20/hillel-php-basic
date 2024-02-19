<?php

require_once 'config.php';

class Connector
{
    private static ?PDO $instance = null;

    private function __construct()
    {
    }

    private function __clone(): void
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): PDO
    {
//        echo "Trying to connect to the database...<br>";

        if (!isset(self::$instance)) {
            $dsn = DB_DRIVER . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASSWORD, [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
//                echo "Database connection established successfully!<br>";
            } catch (PDOException $e) {
                echo "Failed to connect to the database: " . $e->getMessage() . "<br>";
                exit(); // Зупиняємо виконання скрипту у випадку невдалого з'єднання
            }
        }
        return self::$instance;
    }
}
