---
title: Trip sorter README
author: Raphaël GONCALVES
---

 

How to use it
=============

You need, at least, PHP 5.5 to run the script.

Include the autoload file

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
require __DIR__ . '/autoload.php';
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Generate a proper json file where you have travel cards data, and give that file
to the API like this :

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
try{
    echo Travel\TravelFactory::getTravel(__DIR__ . '/cards.json');
} catch (Exception $ex) {
    echo "An error occured !";
    exit;
}
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

 
