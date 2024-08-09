<?php

header("Content-type: application/json");

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Get all composer classes to load
require __DIR__ . '/vendor/autoload.php';


//Get my classes to load
spl_autoload_register(function ($class) {
    // Adapt this depending on your directory structure
    $file = str_replace('\\', '/' ,$class);
    include_once  './' . $file . '.php';
});

use src\enums\Stats;
use src\game\Game;

try {
    $game=new Game();
    $game->sortChallangesBy(STATS::URGENCY);
    $game->run();

    print_r(json_encode($game, JSON_PRETTY_PRINT));

} catch (\Exception $e) {
    print $e->getMessage();
}





