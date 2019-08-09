<?php


namespace Http;


use Api\Response;
use Api\PathFinder;


class Router
{

    public static function init()
    {
        if ( Request::is_getted(['r'], 'GET') )
        {

            if (self::sanitize($_GET['r']))
            {
                $Route = self::generate( $_GET['r'] );

                PathFinder::get($Route[0], $Route[1]);

                return true;
            }

            response::error(500, 'Não foi possível obter a rota');

        }
        else
        {
            response::success('Running');
            return true;
        }

        return false;
    }

    /**
     * @param String $route
     * @return array
     */
    public static function generate(String $route)
    {

        $dirs = explode('/', $route);

        if (count($dirs) < 2) {

            response::error(500, 'Metódo inválido');
            exit;

        }

        $Item = $dirs[ count($dirs) -1 ]; # Item of endpoint

        $Endpoint = '';

        # -2 pois o último é o item do endpoint
        $endpoint_count = count($dirs) - 2;

        for ($i = 0; $i <= $endpoint_count; $i++):

            $Endpoint .= $dirs[$i] . ( $i == $endpoint_count ? '' : '/');

        endfor;

        return [ $Endpoint, $Item ];

    }

    /**
     * @param String $route
     * @return bool
     */
    public static function sanitize(String $route)
    {

        $route = filter_var($route, FILTER_SANITIZE_STRING);

        return is_string($route);

    }

}