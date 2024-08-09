<?php

namespace src\builders\skills;

use src\models\SkillModel;

class SkillModelBuilder
{
    public static function build($entityType)
    {
        return new SkillModel($entityType);
    }
}