<?php

require_once 'application/core/app.php';

define('DS', DIRECTORY_SEPARATOR);
define('APPPATH', realpath('application').DS);

$app = new App();
$app->start('auth', 'index');
