<?php

namespace src\builders\entityType;

use src\builders\luck\LuckModelBuilder;
use src\builders\skills\SkillModelBuilder;
use src\builders\stats\StatModelBuilder;
use src\scenario_characters\Entity;

abstract class AbstractEntityBuilder
{
    protected Entity $entity;

    public function build()
    {
        $this->createEntity();

        $this->setLuck();
        $this->setStats();
        $this->setSkills();

        return $this->entity;
    }

    public function setStats()
    {
        $this->entity->stats = StatModelBuilder::build($this->entity->entityType);
    }

    public function setSkills()
    {
        $this->entity->skills = SkillModelBuilder::build($this->entity->entityType);
    }

    public function setLuck()
    {

        $this->entity->luck = LuckModelBuilder::build($this->entity->entityType);
    }


}