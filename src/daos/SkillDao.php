<?php

namespace src\daos;

class SkillDao extends Dao
{
    public function getByEnityTypeName($name)
    {
        $sql = "SELECT `s`.`name` FROM `entity_type_skills` as `ets` 
                LEFT JOIN `skills` as `s` ON ( `ets`.`id_skill` = `s`.`id`) 
                LEFT JOIN `entity_type` as `et` ON ( `ets`.`id_entity_type` = `et`.`id`)
                WHERE `et`.`name` = :name";
        $allSkillInfo = $this->db->rows( $sql, ['name'=>$name]);

        return $allSkillInfo;
    }
}