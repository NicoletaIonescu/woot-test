<?php

namespace src\game\Skills;

use src\helper\ChanceHappening;

class QuickRouteSkill extends AbstractSkill implements SkillInterface
{
    public function calculateChance()
    {
        return ChanceHappening::check($this->player->luck->value);
    }

    public function calculate()
    {
       return 0;
    }

    public function effect()
    {
      //TODO
    }

}