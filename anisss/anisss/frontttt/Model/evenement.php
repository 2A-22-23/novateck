<?php
class evenement{
    private int $id_event;
    private string $nom_event;
    private string $desc_event;
    private $dated_event;
    private $dater_event;
    private string $img_event;
    private int $nb_event;
    private int $id_cat;

   

    public function __construct($nom_event, $desc_event, $dated_event, $dater_event, $img_event, $nb_event, $id_cat){
        $this->nom_event=$nom_event;
        $this->desc_event=$desc_event;
        $this->dated_event=$dated_event;
        $this->dater_event=$dater_event;
        $this->img_event=$img_event;
        $this->nb_event=$nb_event;
        $this->id_cat=$id_cat;
        
      
    }
    public function getid_event(){
        return $this->id_event;
    }
    public function getnom_event(){
        return $this->nom_event;
    }
    public function getdesc_event(){
        return $this->desc_event;
    }
    public function getdated_event(){
        return $this->dated_event;
    }
    public function getdater_event(){
        return $this->dater_event;
    }
    public function getimg_event(){
        return $this->img_event;
    }
    public function getnb_event(){
        return $this->nb_event;
    }
    public function getid_cat(){
        return $this->id_cat;
    }

    public function setnom_event( $nom_event){
        $this->nom_event=$nom_event;
    }
    public function setdesc_event( $desc_event){
        $this->desc_event=$desc_event;
    }
    public function setdated_event( $datedString){
        $this->dated_event = new DateTime($datedString);
    }
    public function setdater_event( $daterString){
        $this->dated_event = new DateTime($daterString);
    }
    public function setimg_event( $img_event){
        $this->img_event=$img_event;
    }
    public function setnb_event( $nb_event){
        $this->nb_event=$nb_event;
    }
    public function setid_cat( $id_cat){
        $this->id_cat=$id_cat;
    }
  
    
}

?>