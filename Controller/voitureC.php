<?php
include_once '../config.php';
include '../Model/voiture.php';

class voitureC {
    
    // function to retrieve all records from the "voiture" table
    function affichervoiture(){
        $sql = "SELECT * FROM voitures";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    // function to delete a record from the "voiture" table by mat_voiture
    function supprimervoiture($mat_voiture){
        $sql = "DELETE FROM voitures WHERE mat_voiture = :mat_voiture";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':mat_voiture', $mat_voiture);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    
    // function to add a record to the "voiture" table
    function ajouterVoiture($voiture) {
        $sql = "INSERT INTO voitures (mat_voiture, availability, nbr_d_place) VALUES (:mat_voiture, :availability, :nbr_d_place)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'mat_voiture' => $voiture->getmat_voiture(),
                'availability' => $voiture->getavailability(),
                'nbr_d_place' => $voiture->getnbr_d_place()
            ]);
            $_SESSION['error'] = "Data added successfully";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    // function to update a record in the "voiture" table by mat_voiture
    function modifierVoiture($mat_voiture, $availability, $nbr_d_place){
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE voitures SET mat_voiture = :mat_voiture, availability = :availability, nbr_d_place = :nbr_d_place WHERE mat_voiture = :mat_voiture');
            $query->execute([
                'mat_voiture' => $mat_voiture,
                'availability' => $availability,
                'nbr_d_place' => $nbr_d_place
                
            ]);
            return true; // return true if the update was successful
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false; // return false if there was an error during the update
        }
    }
    function recupererVoiture($mat_voiture){
        $sql = "SELECT * FROM voitures WHERE mat_voiture = :mat_voiture";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':mat_voiture', $mat_voiture);
            $query->execute();
            $voiture = $query->fetch(PDO::FETCH_ASSOC);
            return $voiture;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false; // return false if there was an error during the retrieval
        }
    }
    

    
    
}
?>