<?php

namespace src\factorys;


use src\enums\Skills;
use src\game\Round;
use src\game\Skills\HeavyLiftingSkill;
use src\game\Skills\ImpactSkill;
use src\game\Skills\QuickRouteSkill;
use src\scenario_characters\Entity;

class SkillFactory
{
    public static function build($skillName, Entity $player, Entity $opponent, Round $round)
    {
        switch ($skillName) {
            case (Skills::IMPACT):
                $skill = new ImpactSkill($skillName, $player, $opponent, $round);
                return $skill;

            case (Skills::HEAVY_LIFTING):
                $skill = new HeavyLiftingSkill($skillName, $player, $opponent, $round);
                return $skill;

            case (Skills::QUICK_ROUTE):
                $skill = new QuickRouteSkill($skillName, $player, $opponent, $round);
                return $skill;


            default:
                throw new \Exception("No skill with name $skillName");
        }
    }
}