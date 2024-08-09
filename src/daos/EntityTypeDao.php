<?php

namespace src\daos;

use http\Exception;
use src\daos\Dao;

class EntityTypeDao extends Dao
{
    public function getByName($name)
    {
        $entity = $this->db->row("SELECT `entity_type`.`name`, `entity_type`.`luck_min`, `entity_type`.`luck_max` FROM `entity_type` WHERE `name` = :name", ['name' => $name]);
        if (!$entity) {
            throw new \Exception("Entity type `$name` not found");
        }
        return $entity;
    }
}