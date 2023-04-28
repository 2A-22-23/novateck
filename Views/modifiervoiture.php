<?php
include '../Controller/voitureC.php';

if(isset($_POST['mat_voiture']) && isset($_POST['availability']) && isset($_POST['nbr_d_place'])) {
    $mat_voiture = $_POST['mat_voiture'];
    $availability = $_POST['availability'];
    $nbr_d_place = $_POST['nbr_d_place'];
  
    $voitureC = new voitureC();
    $voitureC->modifierVoiture($mat_voiture,$availability, $nbr_d_place,);
    header('Location: affichervoiture.php');
} else {
    echo 'Erreur : des champs sont manquants.';
}
?>
