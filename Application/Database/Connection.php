<?php


namespace Database;

use PDO;
use PDOException;

class Connection
{
    protected $Connection;
    private const INFO = CONFIG_GLOBAL['Connection'];

    public function __construct() {

        if (!self::drivers_is_ok())
            return false;

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

            echo '<h4> Erro ao se conectar: ' . $e->getMessage() . '</h4>';

            exit;

        }

    }

    /**
     * @return PDO
     */
    public function getConn(){
        return $this->Connection;
    }

    /**
     * @return bool
     */
    public static function drivers_is_ok()
    {
        if (extension_loaded('pdo'))
            return true;

        return false;
    }

    /**
     * @return bool
     */
    public static function infos_are_ok()
    {
        if ( self::INFO['host'] == '0.0.0.0' )
            return false;

        if ( empty(self::INFO['database']) )
            return false;

        return true;
    }

}