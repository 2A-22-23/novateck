<?php

include '../Controller/LocationC.php';

$error = "";

// create location
$location = null;

// create an instance of the controller
$locationC = new LocationC();
if (
    isset($_POST["d_dep"]) &&
    isset($_POST["d_arr"]) &&
    isset($_POST["etat_loc"]) 
 
) {
    if (
        !empty($_POST["d_dep"]) &&
        !empty($_POST["d_arr"]) &&
        !empty($_POST["etat_loc"]) 
    ) {
        $location = new Locations(
            null,
            new DateTime($_POST['d_dep']),
            new DateTime($_POST['d_arr']),
            $_POST['etat_loc']
           
        );
        $locationC->addLocation($location);
         header('Location:ListLocations.php');
    } else
        $error = "Missing information";
}


?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "icon" href ="images/logo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">  
    <style>
      /*body{
background-image:url(../location.jpg);
background-size: 1600px;
}*/
body {
	display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 40px;
  background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}

    </style>
    <title> Location</title>
</head>
<body>


<div class="container">
    <form id="form" class="form" name="form" autocomplete="off" method="POST"  style="z-index: 1; left: 333px; top: 4px; position: absolute; height: 132px; width: 494px" onsubmit="return passValidation()">
    <pre><h2 id="formName" > Créer une location  </h2></pre>
        <div class="form-control">
            <input type="date" name="d_dep" id="d_dep" placeholder="Date de départ" onkeyup="d_depValidation()" >
            <td >
            
              <p style="color: purple" id="dpEr"></p>
            
            </td>
            <small>Error message</small>
            <input type="date" name="d_arr" id="d_arr" placeholder="Date d'arrivée" onkeyup="d_arrValidation()" >
            <td >
            
              <p style="color: purple" id="arrEr"></p>
            
            </td>
            <small>Error message</small>
            <input type="text" name="etat_loc" id="etat_loc" placeholder="état de Location" onkeyup="etatValidation()">
            <td >
            
              <p style="color: red" id="etatEr"></p>
            
            </td>
            <small>Error message</small>
            
        </div>
        <button type="submit" value="Submit"  >Submit</button> <!--onclick="passValidation()"-->
        <p style="color: red" id="erreur"></p>
        <a href="contactEmail.php">Contact</a>
    </form>
    
</div>


     <script src="views/app.js"></script> 
     <script src="js/employe1.js"></script> 
</body>
</html> 


