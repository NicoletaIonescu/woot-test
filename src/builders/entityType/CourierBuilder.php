<?php

namespace src\builders\entityType;

use src\enums\EntityType;
use src\scenario_characters\Courier;

class CourierBuilder extends AbstractEntityBuilder implements EntityBuilderInterface
{
    public function createEntity()
    {
        $this->entity = new Courier( EntityType::COURIER);
    }

}