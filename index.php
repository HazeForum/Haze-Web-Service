<?php

require 'init.php';

$System = new Core\System();

header('Content-Type: application/json');

Http\Router::init(true);