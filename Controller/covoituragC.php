<?php
include_once '../config.php';
include '../Model/covoiturage.php';

class covoiturageC {
    function affichercovoiturage(){
        $sql="SELECT * FROM covoiturge"; // correct table name
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function afficherbook(){
        $sql="SELECT * FROM covoiturge"; // correct table name
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
        $sql=" DELETE FROM covoiturge WHERE id_covoiturage=:id_covoiturage"; // correct table name
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
        $sql = "INSERT INTO covoiturge(zone_d, zone_a, nbr_place_d, date, prix, mat_v) VALUES (:zone_d, :zone_a, :nbr_place_d, :date, :prix, :mat_v)"; // remove semicolon in VALUES section
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
    
    function modifiercovoiturage($id_covoiturage, $zone_d, $zone_a, $nbr_place_d, $date, $prix, $mat_v){ // move the function inside the class
        try {
            $db = config::getConnexion();
            $query = $db->prepare('UPDATE covoiturge SET zone_d = :zone_d, zone_a = :zone_a, nbr_place_d = :nbr_place_d, date = :date, prix = :prix, mat_v = :mat_v WHERE id_covoiturage = :id_covoiturage');
            $query->execute([
                'zone_d' => $zone_d,
                'zone_a' => $zone_a,
                'nbr_place_d' => $nbr_place_d,
                'date' => $date,
                'id_covoiturage' => $id_covoiturage,
                'prix' => $prix,
                'mat_v' => $mat_v
            ]);
            return true;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false;
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
public function getCovoiturageById($id_covoiturage) {
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM covoiturge WHERE id_covoiturage = :id_covoiturage");
    $stmt->bindValue(":id_covoiturage", $id_covoiturage);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function bookcovoiturage($id_covoiturage)
{
    // Get the selected carpooling
    $covoiturage = $this->recuperercovoiturage($id_covoiturage);

    // Check if there are still available seats
    if ($covoiturage->getnbr_place_d() > 0) {
        // Update the carpooling with the new number of available seats
        $new_nbr_place_d = $covoiturage->getnbr_place_d() - 1;
        $this->modifiercovoiturage($id_covoiturage, null, null, $new_nbr_place_d, null, null, $covoiturage->getmat_v());

        // Create a booking entry in the database
      

        return true;
    } else {
        return false; // No available seats
    }
}
public function annulebook($id_covoiturage)
{
    // Get the selected carpooling
    $covoiturage = $this->recuperercovoiturage($id_covoiturage);

    // Check if there are still available seats
    if ($covoiturage->getnbr_place_d() > 0) {
        // Update the carpooling with the new number of available seats
        $new_nbr_place_d = $covoiturage->getnbr_place_d() + 1;
        $this->modifiercovoiturage($id_covoiturage, null, null, $new_nbr_place_d, null, null, $covoiturage->getmat_v());

        // Create a booking entry in the database
      

        return true;
    } else {
        return false; // No available seats
    }
}
public function recupererNbrPlaceD($id_covoiturage) {
    // Query the database for the carpooling with the given id
    $db = config::getConnexion();
    $stmt = $db->prepare( "SELECT nbr_place_d FROM covoiturge WHERE id_covoiturage = :id_covoiturage");
   
    $stmt->bindValue(':id_covoiturage', $id_covoiturage);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return the number of available seats
    return $result['nbr_place_d'];
}

function filterTable($nbr_place_d, $prix, $zone_d) {
    $db = config::getConnexion();
    $sql = "SELECT * FROM covoiturge WHERE nbr_place_d = :nbr_place_d AND prix = :prix AND zone_d = :zone_d";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nbr_place_d', $nbr_place_d);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':zone_d', $zone_d);
    try {
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}



}

?>