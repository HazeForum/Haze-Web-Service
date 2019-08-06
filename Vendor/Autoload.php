<?php

class Autoload
{

    const paths = [
      'Application'
    ];

    public static function register()
    {
        self::check_constants();

        spl_autoload_register(function($class_name){

            $filename = '';

            foreach(self::paths as $path):

                $filename = DOCUMENT_ROOT . DS . $path . DS . $class_name.".php";

                if ( !file_exists( $filename ) ){

                    $filename = str_replace('\\', '/', $filename);

                    if ( file_exists( $filename ) ) {

                    }
                } else {

                    require_once $filename;

                    return true;

                }

            endforeach;

            throw new Exception("[{$class_name}] can't load on ' {$filename} '");
        });
    }

    private static function check_constants()
    {
        if (!defined('DOCUMENT_ROOT') || !defined('DS'))
            throw new \Exception('Base Constants is not defined', 0);
    }
}