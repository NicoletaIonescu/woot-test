<?php

namespace src\game;

use src\enums\EntityType;
use src\enums\Stats;
use src\factorys\EntityFactory;
use src\scenario_characters\Courier;
use src\scenario_characters\Entity;

class Game
{
    public Courier $courier;

    public $challanges;

    protected $max_rounds;

    public $isGameOver = false;

    public $rounds;

    protected $current_round;

    public $winner;


    public function __construct($max_rounds=null)
    {
         if ( $max_rounds == null ) {
             $this->max_rounds = 20;
         }

         $this->createCourier();
         $this->createChallanges();

    }

    public function createCourier()
    {
        $this->courier = EntityFactory::build(EntityType::COURIER);

    }

    public function createChallanges()
    {
        for ($i=0; $i<$this->max_rounds; $i++) {
            $this->challanges[] = EntityFactory::build(EntityType::PACKAGE);
        }
    }

    public function sortChallangesBy($statName)
    {
        try {

            usort($this->challanges, function (Entity $a, Entity $b) use ($statName){
                if ($b->getStatValue($statName) === $a->getStatValue($statName)){
                    return $b->luck->value <=> $a->luck->value;
                }
                return $b->getStatValue($statName) <=> $a->getStatValue($statName);
            });

        } catch (\Exception) {
            throw new \Exception ("Can not make the sort the entity does not have the stat for that");
        }

    }

    public function run()
    {
        while(!$this->isGameOver()) {
            $this->current_round++;
            $round = new Round($this->courier, $this->challanges[$this->current_round - 1]);
            $round->play();
            $this->rounds[] = $round;
        }
    }


    private function isGameOver()
    {
        if ($this->current_round == ($this->max_rounds - 1)) {
            $this->isGameOver = true;
            $this->winner = $this->courier;
            return true;
        }

        if ($this->courier->getStatValue(STATS::STAMINA) < 0) {
            $this->isGameOver = true;
            return true;
        }

        return false;
    }
}