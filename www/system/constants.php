<?php
$dir = str_replace('\\', '/', __DIR__);

$dirNew = str_replace('/system', '', $dir);

define('APP_DIR', $dirNew);