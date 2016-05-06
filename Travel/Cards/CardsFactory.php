<?php
namespace Travel\Cards;

/**
 * Create travel's card instance
 *
 * @author Raphaël GONCALVES
 */
class CardsFactory {
    /**
     * Generate multiple travel card
     * 
     * @param string $configurationFile
     * @throws \Travel\Exceptions\CardsFileNotFound
     * @throws \Travel\Exceptions\CardsFileWrongFormat
     */
    static public function getCards($configurationFile)
    {
        if(isset($configurationFile) && !file_exists($configurationFile))
            throw new \Travel\Exceptions\CardsFileNotFound();
        
        $decode = json_decode(file_get_contents($configurationFile));
        
        if(!$decode)
            throw new \Travel\Exceptions\CardsFileWrongFormat();
        
        foreach($decode as $cardData){
            yield self::getCard($cardData);
        }
    }
    
    /**
     * Generate a travel card
     * 
     * @param StdClass $data
     * @return \Travel\Cards\Bus\Bus|\Travel\Cards\Plane\Plane|\Travel\Cards\Train\Train
     * @throws \Travel\Exceptions\CardTypeNotFound
     */
    static private function getCard($data)
    {
        switch($data->type){
            case "train":
                return new Train\Train($data);
                break;
            case "bus":
                return new Bus\Bus($data);
                break;
            case "flight":
                return new Plane\Plane($data);
                break;
            default:
                throw new \Travel\Exceptions\CardTypeNotFound();
                break;
        }
    }
}
