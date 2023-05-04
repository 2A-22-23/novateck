<?php
include '../Controller/CategorieC.php';
$categorieC = new categorieC();
$categorieC->supprimerservice($_GET["Idcat"]);
header('Location:ListCategories.php');
?>