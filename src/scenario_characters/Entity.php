<?php

namespace src\scenario_characters;

use src\game\Round;
use src\models\LuckModel;
use src\models\SkillModel;
use src\models\StatModel;

class Entity
{
    public $entityType;

    public StatModel $stats;

    public SkillModel $skills;
    public LuckModel $luck;

    public function __construct($entityType)
    {

    }

    public function getStatValue($name)
    {
        return $this->stats->getStatInfo($name)->value;
    }

    public function getStatMeasurement($name)
    {
        return $this->stats->getStatInfo($name)->measurement;
    }

    public function setStatValueByStatName($statName, $statValue)
    {
        return $this->stats->setStatValueByStatName($statName, $statValue);
    }

    public function applySkills(Entity $opponent, Round $round)
    {
        $this->skills->applySkills($this, $opponent, $round);
    }


}