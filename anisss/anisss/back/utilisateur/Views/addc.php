<?php
include '../Controller/CategorieC.php';
$article=new CategorieC();

if(

    isset($_POST['nam'])&&isset($_POST['descr'])
   
){
    $categorie= new categorie($_POST['nam'],$_POST['descr']);
    $article->ajouterservice($categorie);
   header('Location: listcategories.php');
}
?>