<?php
namespace Travel\Cards\Bus;

use Travel\Cards\CardInterface;
use Travel\Cards\Card;

/**
 * Bus travel card
 *
 * @author Raphaël GONCALVES
 */
class Bus extends Card implements CardInterface
{
    public function __toString() {
        $return = 'Take the airport bus from '.$this->data->departure->name.' to '.
                $this->data->arrival->name.'.';
        
        if(isset($this->data->seat)){
            $return .= ' Sit in seat '.$this->data->seat.'.';
        } else {
            $return .= " No seat assignment.";
        }
        
        return $return;
    }
}
