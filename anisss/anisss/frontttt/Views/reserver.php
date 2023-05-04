<?php
include '../controller/evenementC.php';

$EvenementC = new EvenementC();

$qauntite=$_GET["quantite"];
$Id_event=$_GET["id_event"];
$Idcat=$_GET["Idcat"];
echo $Idcat;

     if($qauntite > 0){
        $qauntite--;
        $EvenementC->updateQuantite($Id_event,$qauntite);
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('evenement reserver avec succes !')
        window.location.href='Listeevenement.php?Idcat=$Idcat';
    </SCRIPT>");
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Oops cet evenement est complet !')
        window.location.href='Listeevenement.php?Idcat=$Idcat';
    </SCRIPT>");
    }



?>