<?php

require 'init.php';

header('Content-Type: application/json');

$System = new Core\System();

Http\Router::init(true);