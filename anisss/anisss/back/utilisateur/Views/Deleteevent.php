<?php
include '../controller/evenementC.php';
$EvenmenemtC = new EvenementC();
$var = $_GET['Idcat'];
$id = $_GET["Idev"];

$EvenmenemtC->supprimerevent($id);
header("Location: Listeevenement.php?Idcat=$var");
?>