<?php

namespace src\factorys;

use src\builders\entityType\CourierBuilder;
use src\builders\entityType\PackageBuilder;
use src\enums\EntityType;

class EntityFactory
{
    public static function build($entityType)
    {
        switch ($entityType) {
            case (EntityType::COURIER):
                $builder = new CourierBuilder();
                return $builder->build();

            case (EntityType::PACKAGE):
                $builder = new PackageBuilder();
                return $builder->build();

            default:
                throw new \Exception("Entity Factory Error");
        }
    }
}