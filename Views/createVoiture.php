<?php
include '../Controller/VoitureC.php';

if (isset($_POST['register-mat_voiture']) && isset($_POST['register-availability']) && isset($_POST['register-nbr_d_place'])) {
    $voiture = new Voiture($_POST['register-mat_voiture'], $_POST['register-availability'], $_POST['register-nbr_d_place']);
    $voitureC = new VoitureC();
    $voitureC->ajouterVoiture($voiture);
    header('Location: affichervoiture.php');
} else {
    echo 'Veuillez remplir tous les champs';
    
}

?>
