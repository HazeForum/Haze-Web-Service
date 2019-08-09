<?php
DEFINE("DOCUMENT_ROOT", dirname(__FILE__) );
DEFINE("DS", DIRECTORY_SEPARATOR);
session_start();

require 'Vendor/Autoload.php';

Autoload::register();