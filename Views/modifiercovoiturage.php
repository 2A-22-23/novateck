<?php
include '../Controller/covoituragC.php';

if(isset($_POST['id_covoiturage']) && isset($_POST['zone_d']) && isset($_POST['zone_a']) && isset($_POST['nbr_place_d']) && isset($_POST['date'])&& isset($_POST['prix'])&& isset($_POST['mat_v'])) {
    $id_covoiturage = $_POST['id_covoiturage'];
    $zone_d = $_POST['zone_d'];
    $zone_a = $_POST['zone_a'];
    $nbr_place_d = $_POST['nbr_place_d'];
    $date = new DateTime($_POST['date']);
    $prix = $_POST['prix'];
    $mat_v = $_POST['mat_v'];

    $covoituragC = new covoiturageC();
    $date_str = $date->format('Y-m-d H:i:s');
    $covoituragC->modifiercovoiturage($id_covoiturage, $zone_d, $zone_a, $nbr_place_d, $date_str,$prix,$mat_v);
    header('Location: affcovoiturage.php');
} else {
    echo 'Erreur : des champs sont manquants.';
}
?>
