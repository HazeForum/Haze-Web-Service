<?php


namespace Http;


use Api\PathFinder;
use Api\Response;

class Router
{
    /**
     * @param bool $Api_Router
     */
    public static function init(Bool $Api_Router = false)
    {
        if (!isset($_GET['r']))
            return Response::success('Running');

        $Routes = self::mount_route($_GET['r']);

        ( $Api_Router ? self::use_api_router( $Routes[0], $Routes[1]) :  self::use_layout_router() );

    }

    /**
     * @param String $Route
     * @return array
     */
    public static function mount_route(String $Route)
    {
        return explode('/', $Route);
    }

    public static function use_layout_router(Array $Routes)
    {

    }

    /**
     * @param String $Endpoint
     * @param String $Item
     */
    public static function use_api_router(String $Endpoint, String $Item)
    {
        PathFinder::get($Endpoint, $Item);
    }
}