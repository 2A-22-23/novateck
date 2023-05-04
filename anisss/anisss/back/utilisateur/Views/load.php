<?php
$connect = new PDO("mysql:host=localhost;dbname=atelierphp;","root","");
$data = array();
$query = "SELECT * from evenement";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row) {
    $data[] = array(
        "id" => $row["id_event"],
        "title" => $row["nom_event"],
        "start" => $row["dated_event"],
        "end" => $row["dater_event"],  


    );
}
//json format
echo json_encode($data);
?>