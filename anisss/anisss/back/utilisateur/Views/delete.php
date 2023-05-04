<?php
if(isset($_POST['id'])){
    $connect = new PDO("mysql:host=localhost;dbname=atelierphp;","root","");
    $query = "DELETE FROM evenement WHERE id_event=:id";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id'	=> $_POST['id']
        )
    );
}

?>