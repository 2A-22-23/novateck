<?php
class categorie{
    private int $Idcat;
    private string $nam;
    private string $descr;
   
   

    public function __construct($nam, $descr){
        $this->nam=$nam;
        $this->descr=$descr;
       
    
    }
    public function getIdcat(){
        return $this->Idcat;
    }
    public function getnam(){
        return $this->nam;
    }
    public function getdescr(){
        return $this->descr;
    }
    



    public function setnam( $nam){
        $this->nam=$nam;
    }
    public function setdesr( $descr){
        $this->descr=$descr;
    }
    
}

?>
