<?php


namespace Api;
use Core\ErrorLibrary;

class Response
{
    /**
     * @param String $message
     * @param Int $status
     */
    public static function success(String $message, Int $status = 200) {
        echo json_encode([
            'status' => $status,
            'result' => $message
        ]);
    }

    /**
     * @param Int $status
     * @param String $code
     * @param String $Additional
     */
    public static function error(Int $status, String $code, String $Additional = '')
    {
        echo json_encode([
            'status' => $status,
            'result' => ErrorLibrary::out($code) .  (!empty($Additional) ? " $Additional" : '')
        ]);
    }

}