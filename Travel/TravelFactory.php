<?php
namespace Travel;

use Travel\Travel;
use Travel\Cards\CardsFactory;

/**
 * Create a travel with your cards data
 *
 * @author Raphaël GONCALVES
 */
class TravelFactory 
{
    
    /**
     * Return a travel instance with cards from configuration file
     * 
     * @return Travel
     */
    static public function getTravel($configurationFile = null)
    {
        $travel = new Travel();
        
        if(isset($configurationFile)){
            foreach(CardsFactory::getCards($configurationFile) as $card){
                $travel->add($card);
            }
        }
        
        return $travel;
    }
    
}
