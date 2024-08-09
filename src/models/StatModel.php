<?php

namespace src\models;

use src\daos\StatDao;
use src\dtos\StatDto;

class StatModel extends Model implements Modellnterface
{
    public $stats;
    public function __construct($entityTypeName)
    {
        parent::__construct(new StatDao());
        $this->stats = $this->getByName($entityTypeName);
    }

    public function getByName($entityTypeName)
    {
        $entities = [];
        $rows = $this->dao->getByEnityTypeName($entityTypeName);
        foreach ($rows as $row) {
            $entities[] = new StatDto($row->name, $row->min, $row->max, $row->measurement);
        }

        return $entities;
    }

    public function getStatInfo($statName)
    {
        $statKey = array_search($statName, array_column($this->stats, 'name'));
        if ($statKey === false) {
            throw new \Exception("Unknown stat name");
        }

        return $this->stats[$statKey];
    }

    public function setStatValueByStatName($statName, $statValue)
    {
        $statKey = array_search($statName, array_column($this->stats, 'name'));
        if ($statKey === false) {
            throw new \Exception("Unknown stat name");
        }

        $this->stats[$statKey]->value = $statValue;
    }


}
