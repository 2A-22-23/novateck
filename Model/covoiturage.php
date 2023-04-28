<?php
class covoiturage{
    private int $id_covoiturage;
    private string $zone_d;
    private string $zone_a;
    private int $nbr_place_d;
    private DateTime $date;
    private int $prix;
    private int $mat_v;
   
   

    public function __construct($zone_d, $zone_a,$nbr_place_d, DateTime $date,$prix,$mat_v){
        $this->zone_d=$zone_d;
        $this->zone_a=$zone_a;
        $this->nbr_place_d=$nbr_place_d;
        $this->date=$date;
        $this->prix=$prix;
        $this->mat_v=$mat_v;

        
    
    }
    public function getid_covoiturage(){
        return $this->id_covoiturage;
    }
    public function getzone_d(){
        return $this->zone_d;
    }
    public function getzone_a(){
        return $this->zone_a;
    }
    public function getnbr_place_d(){
        return $this->nbr_place_d;
    }
    public function getdate(){
        return $this->date;
    }
    public function getprix(){
        return $this->prix;
    }public function getmat_v(){
        return $this->mat_v;
    }

   
    
    public function setzone_d( $zone_d){
        $this->zone_d=$zone_d;
    }
    public function setzone_a( $zone_a){
        $this->zone_a=$zone_a;
    }
    public function setnbr_place_d( $nbr_place_d){
        $this->nbr_place_d=$nbr_place_d;
    }
    public function setdate( $date){
        $this->date=$date;
    }
    public function setmat_v( $prix){
        $this->prix=$prix;
    }
    public function setprix( $mat_v){
        $this->mat_v=$mat_v;
    }
    
    
}

?>