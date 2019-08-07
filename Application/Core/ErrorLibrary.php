<?php


namespace Core;


class ErrorLibrary
{
    const Error = [
        'Ex00A' =>  'Endpoint not found',
        'Ex01A' =>  'Item not found',
        'Ex200' =>  'Invalid Request'
    ];

    public static function out(String $Code)
    {
        return self::Error[$Code];
    }

}