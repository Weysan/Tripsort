<?php
namespace Travel\Cards\Train;

use Travel\Cards\CardInterface;
use Travel\Cards\Card;

/**
 * Train travel card
 *
 * @author Raphaël GONCALVES
 */
class Train extends Card implements CardInterface 
{
    public function __toString() {
        return 'Take train '.$this->data->transport_identifier.' from '.
                $this->data->departure->name.' to '.
                $this->data->arrival->name.'. Sit in seat '.$this->data->seat.'.';
    }
}
