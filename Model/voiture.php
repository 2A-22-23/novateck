<?php


class Voiture{
    private int $mat_voiture;
    private int $availability;
    private int $nbr_d_place;
    
   
   

    public function __construct(int $mat_voiture, int $availability, int $nbr_d_place) {
        $this->mat_voiture = $mat_voiture;
        $this->availability = $availability;
        $this->nbr_d_place = $nbr_d_place;
        
    
    }
    
    public function getmat_voiture(){
        return $this->mat_voiture;
    }
    
    public function getavailability(){
        return $this->availability;
    }
    
    public function getnbr_d_place(){
        return $this->nbr_d_place;
    }
    
    
    public function setmat_voiture($mat_voiture){
        $this->$mat_voiture = $mat_voiture;
    }
    public function setavailability($availability){
        $this->availability = $availability;
    }
    
    public function setid($nbr_d_place){
        $this->nbr_d_place = $nbr_d_place;
    }
    
   
    
}
?>