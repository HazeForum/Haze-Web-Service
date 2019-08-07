<?php


namespace Database;


use Core\HazeException;
use PDO;
use PDOException;

class Connection
{
    private $Connection;
    private const INFO = CONFIG_GLOBAL['Connection'];

    public function __construct() {

        if (!self::drivers_is_ok())
            throw new HazeException('CxP00');

        if (!self::infos_are_ok())
            return false;

        $dsn = 'mysql:host=' . self::INFO['host'];
        $dsn .= ';dbname=' . self::INFO['database'];

        try
        {

            $this->Connection = new PDO( $dsn, self::INFO['username'], self::INFO['password']);
            $this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e)
        {
            throw new HazeException('Cx000', $e->getMessage());

        }



    }

    public static function drivers_is_ok()
    {
        if (extension_loaded('pdo'))
            return true;

        return false;
    }

    public static function infos_are_ok()
    {
        if ( self::INFO['host'] == '0.0.0.0' )
            return false;

        if ( empty(self::INFO['database']) )
            throw new HazeException('CxP1A');
    }

}