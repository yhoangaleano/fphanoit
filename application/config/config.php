<?php

// Establece que todos los errores de PHP sean notificados
error_reporting(E_ALL);
// Establece el valor de una directiva de configuracion
ini_set("display_errors", 1);

// URL aplicacion
define('URL', 'http://localhost:90/fphanoit');

/**
 * Configuracion base de datos
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'php_mvc');
define('DB_USER', 'root');
define('DB_PASS', '');
