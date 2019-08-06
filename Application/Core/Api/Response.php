<?php


namespace Core\Api;
use Core\ErrorLibrary;

class Response
{
    public static function show(Int $status, String $code)
    {
        echo json_encode([
            'status' => $status,
            'result' => ErrorLibrary::out($code)
        ]);
    }

}