<?php
namespace Travel\Cards;

/**
 * Common methods
 *
 * @author Raphaël GONCALVES
 */
abstract class Card 
{    
    protected $data;
    
    public function __construct($data)
    {        
        $this->data = $data;
    }
    
    /**
     * Get the departure arrival
     * 
     * @return string
     */
    public function getDepartureId()
    {
        return $this->data->departure->identifier;
    }
    
    /**
     * Get the arrival identifier
     * 
     * @return string
     */
    public function getArrivalId()
    {
        return $this->data->arrival->identifier;
    }
    
    /**
     * Return output
     * 
     * @return string
     */
    public function __toString() 
    {
        return 'From '.$this->data->departure->name.' to ' .$this->data->arrival->name. ' by '. $this->data->type;
    }
}
