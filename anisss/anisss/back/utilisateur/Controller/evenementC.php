<?php
include_once '../config.php';
include '../Model/evenement.php';
class EvenementC{
    function afficherevent(){
        $sql="SELECT * FROM evenement";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimerevent($id){
        $sql=" DELETE FROM evenement WHERE id_event=:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id' , $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouterevent($evenement){
   
       $sql = "INSERT INTO evenement (nom_event,desc_event,dated_event,dater_event,img_event,nb_event,Idcat)
                 VALUES (:nom_event, :desc_event, :dated_event,:dater_event,:img_event, :nb_event, :id_cat)";
     $db = config::getConnexion();
     try{
         $query = $db->prepare($sql);
         $query->execute([
                'nom_event' => $evenement->getnom_event(),
                'desc_event' => $evenement->getdesc_event(),
                'dated_event' => $evenement->getdated_event(),
                'dater_event' => $evenement->getdater_event(),
                'img_event' => $evenement->getimg_event(),
                'nb_event' => $evenement->getnb_event(),
                'id_cat' => $evenement->getid_cat()
            
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifierevent($id_event,$evenement){
       try{
        $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                   nom_event = :nom_event,
                   desc_event = :desc_event,
                    dated_event = :dated_event,
                    dater_event = :dater_event,
                    img_event = :img_event,
                    nb_event = :nb_event
                WHERE id_event= :id_event'
            );
            $query->execute([
                'id_event' => $id_event,
                'nom_event' => $evenement->getnom_event(),
                'desc_event' => $evenement->getdesc_event(),
                'dated_event' => $evenement->getdated_event(),
                'dater_event' => $evenement->getdater_event(),
                'img_event' => $evenement->getimg_event(),
                'nb_event' => $evenement->getnb_event(),
    
]);
    } catch (Exception $e){
        $e->getMessage();
}}


function recupererevent($ID_evnt,$idcat){
    $sql="SELECT * FROM evenement INNER JOIN categorie on evenement.Idcat = categorie.Idcat WHERE categorie.Idcat = $idcat AND id_event=$ID_evnt";
    $db = config::getConnexion();
try{
    $query = $db->prepare($sql);
$query->execute();
$evenement=$query->fetch();
return $evenement;
}catch (Exception $e){
    $e->getMessage();}
}
function joinCategorie($Idcat){
    $sql=("SELECT * FROM evenement INNER JOIN categorie on evenement.Idcat = categorie.Idcat WHERE categorie.Idcat = $Idcat");
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur:' . $e->getMessage());
    }
}


}
	



?>