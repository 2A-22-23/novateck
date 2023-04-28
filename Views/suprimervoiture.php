<?php
include '../Controller/voitureC.php';
$voitureC = new voitureC();
$voitureC->supprimervoiture($_GET["mat_voiture"]);
header('Location: affichervoiture.php');
?>
