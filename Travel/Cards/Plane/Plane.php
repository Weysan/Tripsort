<?php
namespace Travel\Cards\Plane;

use Travel\Cards\CardInterface;
use Travel\Cards\Card;

/**
 * Flight card
 *
 * @author Raphaël GONCALVES
 */
class Plane extends Card implements CardInterface 
{
    public function __toString() {
        $return = 'From '.$this->data->departure->name.', take the flight '.$this->data->transport_identifier.' to '.
                $this->data->arrival->name.'.';
        
        $return .= ' '.$this->data->boarding_details.', seat '.$this->data->seat.'.';
        
        if(isset($this->data->baggage_handling) && $this->data->baggage_handling != 'automatic'){
            $return .= ' Baggage drop at ticket counter '.$this->data->baggage_handling.'.';
        } else {
            $return .= " Baggage will we automatically transferred from your last leg.";
        }
        
        return $return;
    }
}
