<?php

namespace src\models;

use src\daos\EntityTypeDao;

class LuckModel extends Model implements Modellnterface
{
    protected $luck_min;
    protected $luck_max;

    public $value;


    public function __construct($entityTypeName)
    {

        parent::__construct(new EntityTypeDao());

        $info = $this->dao->getByName($entityTypeName);
        $this->luck_min = $info->luck_min;
        $this->luck_max = $info->luck_max;

        $this->value = rand($this->luck_min, $this->luck_max);
    }

    public function getByName($entityTypeName)
    {
        return $this->dao->getByName($entityTypeName);
    }


}