<?php

namespace src\storage;

use Dcblogdev\PdoWrapper\Database;

class Db
{
    private static $_instance;

    public static function getInstance(){
        if(!isset(self::$_instance))
        {
            self::$_instance=self::_getConnection();
        }

        return self::$_instance;
    }

    private static function _getConnection(){
        $options = parse_ini_file('./env.ini');
        return self::$_instance = new Database($options);
    }
}