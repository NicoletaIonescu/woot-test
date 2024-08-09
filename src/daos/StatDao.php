<?php

namespace src\daos;

class StatDao extends Dao
{
    public function getByEnityTypeName($name)
    {
        $sql = "SELECT `s`.`name`, `sp`.`min`,`sp`.`max`, `sp`.`measurement` FROM `entity_type_stats` as `ets` 
                LEFT JOIN `stats` as `s` ON ( `ets`.`id_stat` = `s`.`id`) 
                LEFT JOIN `stats_prop` as `sp` ON (`s`.`id` = `sp`.`id_stat`) 
                LEFT JOIN `entity_type` as `et` ON ( `ets`.`id_entity_type` = `et`.`id`)
                WHERE `et`.`name` = :name";
        $allStatsInfo = $this->db->rows( $sql, ['name'=>$name]);

        return $allStatsInfo;
    }
}