<?php

namespace src\builders\luck;

use src\models\LuckModel;

class LuckModelBuilder
{
    public static function build($entityType)
    {
        return new LuckModel($entityType);
    }
}