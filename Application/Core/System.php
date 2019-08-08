<?php


namespace Core;

use Database\Connection;

class System
{

    protected $Conn;

    public function __construct()
    {
        $Conn = new Connection();
    }

}