<?php
DEFINE("DOCUMENT_ROOT", dirname(__FILE__) );
DEFINE("DS", DIRECTORY_SEPARATOR);
session_start();

spl_autoload_register(function($class_name){

    $filename = DOCUMENT_ROOT . DS . "Application". DS . $class_name.".php";

    if ( !file_exists( $filename ) ){
        $filename = str_replace('\\', '/', $filename);
        if ( !file_exists( $filename ) ) {
            throw new Exception("Arquivo nao encontrado: '{$filename}'. => ");
        }
    }
    require_once $filename;
});

$System = new Core\System();