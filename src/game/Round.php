<?php

namespace src\game;

use src\scenario_characters\Package;
use src\scenario_characters\Courier;

class Round
{
    protected Courier $courier;
    protected Package $challange;

    public $skills_applied;
    public $courier_state;
    public $challange_state;


    public function __construct(Courier $courier, Package $challange)
    {
        $this->courier = $courier;
        $this->challange = $challange;

        $this->courier_state = json_encode($this->courier);
        $this->challange_state = json_encode($this->challange);


    }

    public function play()
    {
        $this->courier->applySkills($this->challange, $this);
        $this->challange->applySkills($this->courier, $this);
    }
}


