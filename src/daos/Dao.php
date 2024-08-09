<?php

namespace src\daos;

use src\storage\Db;

class Dao
{
    protected $db;

    public function __construct()
    {
        $this->db =  Db::getInstance();
    }
}