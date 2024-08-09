<?php

namespace src\models;

use src\daos\SkillDao;
use src\dtos\SkillDto;
use src\factorys\SkillFactory;
use src\game\Round;
use src\scenario_characters\Entity;

class SkillModel extends Model implements Modellnterface
{
    public $skills;

    public function __construct($entityTypeName)
    {
        parent::__construct(new SkillDao());
        $this->skills = $this->getByName($entityTypeName);

    }

    public function getByName($entityTypeName)
    {
        $entities = [];
        $rows = $this->dao->getByEnityTypeName($entityTypeName);
        foreach ($rows as $row) {
            $entities[] = new SkillDto($row->name);
        }
        return $entities;
    }

    public function skillExists($skillName)
    {
        $skillKey = array_search($skillName, array_column($this->skills, 'name'));
        if ($skillKey === false) {
            return false;
        }

        return true;
    }

    public function applySkills(Entity $player, Entity $opponent, Round $round)
    {
        $skills = array_column($this->skills, 'name');
        foreach ($skills as $skill) {
            $skillObject = SkillFactory::build($skill, $player, $opponent, $round);
            $skillObject->apply();
        }
    }


}