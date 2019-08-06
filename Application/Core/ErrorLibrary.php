<?php


namespace Core;


class ErrorLibrary
{
    const Error = [
      'Ex00A' => 'Endpoint not found'
    ];

    public static function out(String $Code)
    {
        return self::Error[$Code];
    }

}