<?php


namespace Core;


class ErrorLibrary
{
    const Error = [
        'Ex00A' =>  'Endpoint not found',
        'Ex01A' =>  'Item not found',
        'Ex200' =>  'Invalid Request',

        'CxP00' =>  'PDO Driver is Missing',
        'Cx000' =>  "Can't connect with server",
        'CxP1A' =>  "Database cannot be empty",
    ];

    public static function out(String $Code)
    {
        return self::Error[$Code];
    }

}