<?php

// Include your controller file
include '../Controller/covoituragC.php';

// Instantiate an object of your controller class
$controller = new covoiturageC();

// Get the ID of the carpooling from the form submission
if (isset($_POST['id_covoiturage'])) {
    $id_covoiturage = $_POST['id_covoiturage'];
    // Get the number of available seats for the selected carpooling
    $nbr_place_d = $controller->recupererNbrPlaceD($id_covoiturage);

    // Check if there are still available seats
    if ($nbr_place_d > 0) {
        // Update the carpooling with the new number of available seats
        $new_nbr_place_d = $nbr_place_d - 1;
        $controller->modifiercovoiturage($id_covoiturage, null, null, $new_nbr_place_d, null, null, null);

        // Create a booking entry in the database
        // ...

        header('Location: redirect2.php');
    } 
} else {
    echo "No carpooling ID provided!";
    exit();
}

?>
