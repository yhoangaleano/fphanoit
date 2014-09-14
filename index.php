<?php

// Composer auto-loader
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}

// configuracion (error, base de datos)
require 'application/config/config.php';

// ORM
require_once 'application/libs/php-activerecord/ActiveRecord.php';

// carga las clases de la aplicacion
require 'application/libs/fphanoit.php';
require 'application/libs/controller.php';

// inicia la aplicacion
$app = new FPHANOIT();
