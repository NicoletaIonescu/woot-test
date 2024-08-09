<?php

namespace src\game\Skills;

interface SkillInterface
{
    public function apply();
    public function calculate();
    public function effect();
    public function passRoundInformation();
    public function calculateChance();
}