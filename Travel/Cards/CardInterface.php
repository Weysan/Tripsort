<?php
namespace Travel\Cards;

/**
 * Each card should use thaht interface
 * 
 * @author Raphaël GONCALVES
 */
interface CardInterface 
{
    public function __construct($data);
    public function getDepartureId();
    public function getArrivalId();
}
