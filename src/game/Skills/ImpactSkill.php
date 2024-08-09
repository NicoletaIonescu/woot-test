<?php

namespace src\game\Skills;

use src\enums\Stats;
use src\helper\ChanceHappening;

class ImpactSkill extends AbstractSkill implements SkillInterface
{
    public function calculateChance()
    {
        return ChanceHappening::check(100 - ($this->opponent->luck->value));
    }

    public function calculate()
    {
        $weight = $this->player->getStatValue(STATS::WEIGHT);
        $traffic = $this->player->getStatValue(STATS::TRAFFIC);
        $strenght = $this->opponent->getStatValue(STATS::STRENGHT);

        $impact_value = round(($weight * $traffic)/$strenght);

        return $impact_value;
    }

    public function effect()
    {
        $stamina = $this->opponent->getStatValue(STATS::STAMINA);
        $impact_value = $this->calculate();
        $newStamina = $stamina - $impact_value;
        $this->opponent->setStatValueByStatName(STATS::STAMINA, $newStamina);
    }
}