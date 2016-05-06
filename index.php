<?php

require __DIR__ . '/autoload.php';
require __DIR__ . '/random_cards.php';
try{
    echo Travel\TravelFactory::getTravel(__DIR__ . '/cards_random.json');
} catch (Exception $ex) {
    echo "An error occured !";
    var_dump($ex);
    exit;
}
