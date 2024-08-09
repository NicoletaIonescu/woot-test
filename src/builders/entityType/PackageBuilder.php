<?php

namespace src\builders\entityType;

use src\enums\EntityType;
use src\scenario_characters\Package;

class PackageBuilder extends AbstractEntityBuilder implements EntityBuilderInterface
{
    public function createEntity()
    {
        $this->entity = new Package(EntityType::PACKAGE);
    }
}