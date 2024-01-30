<?php
spl_autoload_register(function ($class) {
    // Префикс для вашего проекта
    $prefix = 'AbstractNamespace\\';

    // Базовая директория для классов в проекте
    $baseDir = __DIR__ . '/'; // Поменяйте это, если ваши классы находятся в другой директории

    // Если класс использует ваш префикс, вырежьте его и добавьте к базовой директории
    $class = str_replace($prefix, '', $class);

    // Замените обратные слеши на обычные и добавьте .php
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    // Проверка наличия файла и его загрузка
    if (file_exists($file)) {
        require_once $file;
    }
});
