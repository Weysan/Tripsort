<?php
namespace Travel;

use Travel\Cards\CardInterface;

/**
 * Class wich will provide and sort your travel roadmap.
 *
 * @author Raphaël GONCALVES
 */
class Travel {
    /**
     * set of travel cards
     * @var array 
     */
    protected $cards = array();
    
    /**
     * Array of departure ID ordered by card order
     * 
     * @var array 
     */
    protected $tmp_departure_id = array();
    
    /**
     * Array of arrival ID ordered by card order
     * 
     * @var array 
     */
    protected $tmp_arrival_id = array();
    
    /**
     * Add a travel card to your current travel.
     * 
     * @param CardInterface $card
     * @return Travel $this
     */
    public function add(CardInterface $card)
    {
        $this->cards[] = $card;
        $this->tmp_arrival_id[] = $card->getArrivalId();
        $this->tmp_departure_id[] = $card->getDepartureId();
                
        return $this;
    }
    
    /**
     * Remove a travel card from your current travel.
     * 
     * @param CardInterface $card
     * @return Travel $this
     */
    public function remove(CardInterface $card)
    {
        foreach($this->cards as $key => $cardRepo){
            if($card === $cardRepo){
                unset($this->card[$key]);
                unset($this->tmp_arrival_id[$key]);
                unset($this->tmp_departure_id[$key]);
                break;
            }
        }
        
        return $this;
    }
    
    /**
     * Sort cards
     * 
     */
    protected function sort()
    {
        $tmp_travel = array();
        
        /* search the first step */
        $diff = array_diff($this->tmp_departure_id, $this->tmp_arrival_id);
        if(count($diff)){
            $k = array_search(array_pop($diff), $this->tmp_departure_id);
            $tmp_travel[] = $this->cards[$k];

            /**
             * Construct the sorted travel
             */
            while(false !== ($search_key = array_search($tmp_travel[count($tmp_travel) - 1]->getArrivalId(), $this->tmp_departure_id) ) ){
                $tmp_travel[] = $this->cards[$search_key];
            }
            $this->cards = $tmp_travel;
            $this->tmp_departure_id = array();
            $this->tmp_arrival_id = array();
        }
    }
    
    /**
     * Return your travel roadmap sorted.
     * 
     * @return string
     */
    public function __toString() {
        $this->sort();
        
        $return = '';
        
        foreach($this->cards as $card){
            ob_start();
            echo $card.'<br />';
            $return .= ob_get_clean();
        }
        
        $return .= 'You have arrived at your ﬁnal destination.';
        
        return $return;
    }
    
}
