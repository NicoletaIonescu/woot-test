<?php

namespace src\game\Skills;

use src\game\Round;
use src\scenario_characters\Entity;

abstract class AbstractSkill implements SkillInterface
{
    protected $skillName;

    protected $player;

    protected $opponent;

    protected $round;

    public function __construct($skillName, Entity $player, Entity $opponent, Round $round)
    {
        $this->skillName = $skillName;
        $this->player = $player;
        $this->opponent = $opponent;
        $this->round = $round;
    }

    public function apply()
    {
        $chance = $this->calculateChance();
        if(!$chance) {
            return ;
        }

        $this->effect();
        $this->passRoundInformation();
    }

    public function passRoundInformation()
    {
        $this->round->skills_applied[] = [[$this->skillName => $this->calculate(), 'from' => $this->player->entityType, 'to' => $this->opponent->entityType]];
    }

}