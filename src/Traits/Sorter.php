<?php

namespace src\Traits;


trait Sorter {  
    
    /**
     *
     * @var string 
     */
    public $readableText;
    
    /**
     * Get Boarding card randomly
     * 
     * @param  array $datas
     * @return array
     */
    public function sort($datas) 
    {
        $number = rand(0, (count($datas)-1));
        return (array) $datas[$number];
    }
    
    /**
     * 
     * @param array $data
     */
    public function makeReadable($data) 
    {
        $string = "";

        $city           = $data['departure']['city'];
        $transportType  = $data['departure']['station']['transportation'];
        $transportId    = $data['departure']['station']['id'];
        $gate           = $data['departure']['station']['gate'];
        $transportSeat  = $data['departure']['station']['seat'];
        $baggage        = $data['departure']['station']['luggage'];
        
        $arrivalCity             = $data['arrival']['city'];
        $arrivalTransportType    = $data['arrival']['station']['transportation'];
        $arrivalTransportId      = $data['arrival']['station']['id'];
        $arrivalTransportGate    = $data['arrival']['station']['gate'];
        $arrivalTransportSeat    = $data['arrival']['station']['seat'];
        $arrivalTransportBaggage = $data['arrival']['station']['luggage'];        
        
        foreach ($data['departure']['steps'] as $k => $v) {
            $step = $data['departure']['steps'][$k];
            $type = $step['transportation'];
            $id   = $step['id'];
            $town = (!empty($step['town'])) ? "from ".$step['town'] : "";
            $seat = (!empty($step['seat'])) ? 
                    "Sit in seat ".$step['seat'] : "No seat assignment.<br/>";

            $string .= "Take $type $id $town to $city. $seat"."\r\n";
        }        
        
        $string .= "From $city airport, take $transportType $transportId to"
                . " $arrivalCity. Gate $gate, seat $transportSeat. Baggage"
                . " drop at ticket counter $baggage.<br/>"."\r\n";         

        $string .= "From $arrivalCity airport, take $arrivalTansportType $arrivalTransportId to"
                . " $arrivalCity. Gate $gate, seat $transportSeat. Baggage"
                . " drop at ticket counter $baggage.<br/>"."\r\n"; 
        
        $string .= "You have arrived at your final destination."."\r\n";         
        
        echo $string;
    }    
}

