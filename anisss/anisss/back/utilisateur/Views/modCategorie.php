
<?php
include '../Controller/CategorieC.php';
$Idcat = $_GET["Idcat"];
$categorieC=new categorieC();
if(
    isset($_POST['nam']) &&isset($_POST['descr'])
 )
 
    
{
    $categorie = new categorie($_POST['nam'],$_POST['descr']);
    $categorieC->modifierservice($Idcat,$categorie);
}
else
echo 'erreur';
header('Location: ListCategories.php');
?>