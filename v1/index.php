<?php

error_reporting(-1);
ini_set('display_errors', 1);

require_once 'application/core/app.php';

define('DS', DIRECTORY_SEPARATOR);
define('APPPATH', realpath('application').DS);

$app = new App();
$app->start();
