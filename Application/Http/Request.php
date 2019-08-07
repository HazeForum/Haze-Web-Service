<?php


namespace Http;


class Request
{
    const CustomMethods = [
        'PUT',
        'DELETE',
        'CREATE'
    ];

    /**
     * @param String $Url
     * @param array $Params
     * @return bool|string
     */
    public static function get(String $Url, Array $Params)
    {

        $Url .= '?' . Helper::get_params_str($Params);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $Url,
        ]);

        $res = curl_exec($curl);

        curl_close($curl);

        return $res;
    }

    /**
     * @param String $Url
     * @param array $Params
     * @return bool|string
     */
    public static function post(String $Url, Array $Params)
    {

        $ParamsStr = Helper::get_params_str($Params);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $Url,
            CURLOPT_POSTFIELDS => $ParamsStr
        ]);

        $res = curl_exec($curl);

        curl_close($curl);

        return $res;
    }

    /**
     * @param array $Params
     * @param String $Method
     * @return bool
     */
    public static function is_getted(Array $Params, String $Method = 'GET')
    {

        if (!self::validate_method($Method))
            return false;

        $Method = array_key_exists($Method, self::CustomMethods) ? $_REQUEST : ($Method == 'GET' ? $_GET : $_POST);

        foreach ($Params as $param):

            if ( !isset($Method[$param]) )
                return false;

        endforeach;

        return true;

    }

    public static function validate_method(String $Method) {
        $Method = strtoupper($Method);

        return $_SERVER['REQUEST_METHOD'] == $Method;
    }

}