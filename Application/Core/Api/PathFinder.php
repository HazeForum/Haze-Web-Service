<?php


namespace Core\Api;
use Core\HazeException;

class PathFinder
{
    const Path = 'Endpoint';

    public static function get(String $Endpoint, String $Item)
    {
        $path = DOCUMENT_ROOT . DS . self::Path . DS . $Endpoint;

        if (!is_dir($path))
            return Response::show(400, 'Ex00A');

    }

}