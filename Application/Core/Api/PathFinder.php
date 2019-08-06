<?php


namespace Core\Api;
use Core\HazeException;

class PathFinder
{
    const Path = 'Endpoint';

    public static function get(String $Endpoint, String $Item)
    {
        $path = DOCUMENT_ROOT . DS . self::Path . DS . $Endpoint;

        if (!is_dir($path)) {
            throw new HazeException( 'Ex00A');
        }

    }

}