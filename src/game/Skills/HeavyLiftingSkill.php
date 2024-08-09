<?php

namespace src\game\Skills;

use src\enums\Stats;
use src\helper\ChanceHappening;

class HeavyLiftingSkill extends AbstractSkill implements SkillInterface
{
    public function calculateChance()
    {
        return ChanceHappening::check($this->player->luck->value);
    }

    public function calculate()
    {
        return 5;
    }

    public function effect()
    {
        $stamina = $this->player->getStatValue(STATS::STAMINA);
        $newStamina = $stamina + $this->calculate();
        $this->player->setStatValueByStatName(STATS::STAMINA, $newStamina);
    }
}