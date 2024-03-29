<?php


namespace Database;


use PDO;

class Select extends Connection
{

    public function __construct() { parent::__construct(); }

    private static $table;

    private static $data;

    private static $where;

    private static $limit;

    public static function table(String $Table) { self::set_value('table', $Table); }

    public static function data(String $Data)   { self::set_value('data', $Data);   }

    public static function where(String $Where) { self::set_value('where', $Where); }

    public static function limit(Int $Limit)    { self::set_value('limit', $Limit); }

    public function get()
    {
        $query = self::generate_query();

        $stmt = $this->Connection->query($query)->fetch(PDO::FETCH_ASSOC);

        return $stmt;
    }

    /**
     * @param $var
     * @param $value
     */
    private static function set_value($var, $value)
    {
            self::$$var = $value;
    }

    /**
     * @return string
     */
    private static function generate_query()
    {
        $data = empty(self::$data) ? '*' : self::$data;

        $table = self::$table;

        $where = '';

        if (!empty(self::$where))
            $where = "WHERE " . self::$where;

        $limit = 10;

        if (!empty(self::$limit))
            $limit = self::$limit;

        $limit = "LIMIT $limit";



        return "SELECT $data FROM $table $where $limit";
    }

}