<?php

namespace src\builders\entityType;

interface EntityBuilderInterface
{
    public function build();
    public function createEntity();
    public function setStats();
    public function setSkills();
    public function setLuck();
}