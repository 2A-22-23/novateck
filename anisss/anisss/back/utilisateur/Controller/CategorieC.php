<?php
include_once '../config.php';
include '../Model/Categorie.php';
class categorieC {
    function afficherservice(){
        $sql="SELECT * FROM categorie";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
   
    function supprimerservice($Idcat){
        $sql=" DELETE FROM categorie WHERE Idcat=:Idcat";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':Idcat' , $Idcat);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
    function ajouterservice($categorie){

       $sql = "INSERT INTO categorie (nam,descr)
                 VALUES (:nam, :descr)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            'nam'=> $categorie->getnam(),
            'descr'=> $categorie->getdescr(),
          
       
        ]);
        $_SESSION['error']="data add seccsesfuly";
} catch (Exception $e){
    $e->getMessage();
}

    }
function modifierservice($Idcat,$categorie){
       try{
        $db = config::getConnexion();
$query = $db->prepare('UPDATE categorie SET nam = :nam, descr= :descr  WHERE Idcat= :Idcat');
$query->execute([
    'nam'=> $categorie->getnam(),
    'descr'=> $categorie->getdescr(),
   'Idcat'=> $Idcat
]);
    } catch (Exception $e){
        $e->getMessage();
}}
function recupererservice($Idcat){
    $sql="SELECT * from categorie where Idcat=$Idcat";
    $db = config::getConnexion();
try{
    $query = $db->prepare($sql);
$query->execute();
$categorie=$query->fetch();
return $categorie;
}catch (Exception $e){
    $e->getMessage();}
}

}
?>