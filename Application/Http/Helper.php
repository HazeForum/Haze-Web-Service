<?php


namespace Http;


class Helper
{
    /**
     * @param array $Params
     * @return string
     */
    public static function get_params_str(Array $Params)
    {
        $i = 1;
        $n = count($Params);
        $ParamsStr = '';

        foreach ($Params as $key => $value):

            $ParamsStr .= $key . '=' . $value . ($i < $n ? '&' : '') ;

        endforeach;

        return $ParamsStr;
    }

}