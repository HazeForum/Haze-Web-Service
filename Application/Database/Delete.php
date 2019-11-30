<?php


namespace Database;


use PDO;

class Delete extends Connection
{
    public function __construct() { parent::__construct(); }

    private static $table;

    private static $data;

    private static $where;

    private static $limit;

    public static function table(String $Table) { self::set_value('table', $Table); }

    public static function where(String $Where) { self::set_value('where', $Where); }

    public function do()
    {
        $query = self::generate_query();

        $stmt = $this->Connection->query($query);

        return $stmt;
    }

    /**
     * @param $var
     * @param $value
     */
    private static function set_value($var, $value) { self::$$var = $value; }

    /**
     * @return string
     */
    private static function generate_query()
    {
        $table = self::$table;

        $where = '';

        if (!empty(self::$where))
            $where = "WHERE " . self::$where;


        return "DELETE FROM $table $where";
    }

}