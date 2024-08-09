<?php

namespace src\dtos;

class SkillDto
{
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}