<?php

namespace src\helper;

class ChanceHappening
{
    public static function check($luck)
    {
        $chance = rand(1, 100);
        if ($chance <= $luck) {
            return true;
        }

        return false;
    }
}