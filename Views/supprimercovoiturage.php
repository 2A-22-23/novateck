<?php
include '../Controller/covoituragC.php';
$covoiturageC = new covoiturageC();
$covoiturageC->supprimercovoiturage($_GET["id_covoiturage"]);
header('Location: affcovoiturage.php');
?>
