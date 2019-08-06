<?php


namespace Core\Api;
use Core\HazeException;

class PathFinder
{
    const Path = 'Endpoints';

    /**
     * @param String $Endpoint
     * @param String $Item
     */
    public static function get(String $Endpoint, String $Item)
    {
        $path = DOCUMENT_ROOT . DS . self::Path . DS . $Endpoint . DS;

        if (!is_dir($path))
            return Response::error(400, 'Ex00A');

        $file = $path . $Item . '.php';

        if (!file_exists($file))
            return Response::error(404, 'Ex01A');

        require_once $file;
    }

}