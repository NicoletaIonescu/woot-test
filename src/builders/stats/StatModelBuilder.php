<?php

namespace src\builders\stats;

use src\enums\EntityType;
use src\models\StatModel;

class StatModelBuilder
{
    public static function build($entityType)
    {
        return new StatModel($entityType);
    }
}