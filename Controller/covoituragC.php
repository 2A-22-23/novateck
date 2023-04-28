<?php
include_once '../config.php';
include '../Model/covoiturage.php';
class covoiturageC {
    function affichercovoiturage(){
        $sql="SELECT * FROM covoiturge";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimercovoiturage($id_covoiturage){
        $sql=" DELETE FROM covoiturge WHERE id_covoiturage=:id_covoiturage";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_covoiturage' , $id_covoiturage);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajoutercovoiturage($covoiturage) {
        $sql = "INSERT INTO covoiturge(zone_d, zone_a,nbr_place_d,date,prix,mat_v) VALUES (:zone_d, :zone_a,:nbr_place_d,:date,:prix,;mat_v)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'zone_d' => $covoiturage->getzone_d(),
                'zone_a' => $covoiturage->getzone_a(),
                'nbr_place_d' => $covoiturage->getnbr_place_d(),
                'date' => $covoiturage->getdate()->format('Y-m-d H:i:s'),
                'prix' => $covoiturage->getprix(),
                'mat_v' => $covoiturage->getmat_v()
            ]);
            $_SESSION['error'] = "Data added successfully";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    




// modifiercovoiturage function to update a covoiturage record
function modifiercovoiturage($id_covoiturage, $zone_d, $zone_a, $nbr_place_d, $date,$prix,$mat_v){
    try {
        $db = config::getConnexion();
        $query = $db->prepare('UPDATE covoiturge SET zone_d = :zone_d, zone_a = :zone_a , nbr_place_d = :nbr_place_d , date = :date , prix = :prix ,mat_v = :mat_v WHERE id_covoiturage = :id_covoiturage');
        $query->execute([
            'zone_d' => $zone_d,
            'zone_a' => $zone_a,
            'nbr_place_d' => $nbr_place_d,
            'date' => $date,
            'id_covoiturage' => $id_covoiturage,
            'prix' => $prix,
            'mat_v' => $mat_v
        ]);
        return true; // return true if the update was successful
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false; // return false if there was an error during the update
    }
}


// recuperercovoiturage function to retrieve a covoiturage record by id_covoiturage
function recuperercovoiturage($id_covoiturage){
    $sql = "SELECT * FROM covoiturge WHERE id_covoiturage = :id_covoiturage";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_covoiturage', $id_covoiturage);
        $query->execute();
        $covoiturage = $query->fetch(PDO::FETCH_ASSOC);
        return $covoiturage;
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false; // return false if there was an error during the retrieval
    }
}


function affichertri(){
			
    $sql="SELECT * FROM covoiturge  ORDER BY nbr_place_d";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
}
function afficherRecherche($rech){
			
    $sql="SELECT * FROM covoiturge where nbr_place_d like '%$rech%'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }	
}

}

?>