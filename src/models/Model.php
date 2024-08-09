<?php

namespace src\models;

class Model
{
    protected $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

}