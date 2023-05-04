<?php
$connect = new PDO("mysql:host=localhost;dbname=atelierphp;","root","");
if(isset($_POST['id']))
{
  $query ="
  UPDATE evenement SET nom_event=:title,dated_event=:start_event,dater_event=:end_event WHERE id_event=:id
  ";
  $statement = $connect->prepare($query);
   
  $statement->execute(
    array(
        ":title" => $_POST['title'],
        ":start_event" => $_POST['start'],
        ":end_event" => $_POST['end'],
        ":id" => $_POST['id']
    )
    );  
}
?>