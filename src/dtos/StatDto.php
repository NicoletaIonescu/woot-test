<?php

namespace src\dtos;


class StatDto
{
    public $name;

    public $measurement;

    public $value;

    public function __construct($name=null, $min=null, $max=null, $measurement=null)
    {
        if ($name != null) {
            $this->name = $name;
        }

        if (($min != null) && ( $max != null) ) {
            $this->value = rand($min, $max);
        } else {
            throw new Exception("A max or min value must be set for the stat");
        }

        if ($measurement != null) {
            $this->measurement = $measurement;
        }
    }
}