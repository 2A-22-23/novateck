<?php

include '../Controller/covoituragC.php';
$article = new covoiturageC();

if (!empty($_POST['register-zone_d']) && !empty($_POST['register-zone_a']) && !empty($_POST['register-nbr_place_d']) && !empty($_POST['register-date'])&& !empty($_POST['register-prix'])&& !empty($_POST['register-mat_v'])) {
    $date = new DateTime($_POST['register-date']);
    $covoiturage = new covoiturage($_POST['register-zone_d'], $_POST['register-zone_a'], $_POST['register-nbr_place_d'], $date, $_POST['register-prix'], $_POST['register-mat_v']);
    $article->ajoutercovoiturage($covoiturage);
    header('Location: affcovoiturage.php');
} else {
    echo 'Veuillez remplir tous les champs';
}

?>
