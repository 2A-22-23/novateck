<?php
include '../Controller/evenementC.php';
$Idcat = $_GET["Idcat"];

$evenementC = new evenementC();

if(

    isset($_POST['nom_event'])&&isset($_POST['desc_event'])&&isset($_POST['dated_event'])&&isset($_POST['dater_event'])&&isset($_POST['img_event'])&&isset($_POST['nb_event'])
   
){
    $evenement= new evenement($_POST['nom_event'],$_POST['desc_event'],$_POST['dated_event'],$_POST['dater_event'],$_POST['img_event'],$_POST['nb_event'],$Idcat);
    $evenementC->ajouterevent($evenement);
    echo 'erreur';
  header("Location: listeevenement.php?Idcat=$Idcat");
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
      body{
background-image:url(../reservation.jpg);
background-size: 1400px;


        }
    

  
    </style>
    <title> Evenement</title>
</head>
<body>

<div class="container">
    <form id="form" action="" class="form" name="form" autocomplete="off" method="POST"  style="z-index: 1; left: 500px; top: 4px; position: absolute; height: 132px; width: 494px" onsubmit="return submitValidation()" >
    <pre><h2 id="formName" > Ajouter votre Evenement :  </h2></pre>
        <div class="form-control">
            <input type="text" name="nom_event" id="nom_event" placeholder="Name"  />
            <span id="nomerror"></span>
            
           <td>
            <input textarea name="desc_event" id="descr" placeholder="Description"  />
            <span id="deserror"></span>
            </td>

            <td>
            <input type="date" name="dated_event" id="dated_event" placeholder="Name"  />
            <span id="derror"></span>
            </td>

            <td>
            <input type="date" name="dater_event" id="dater_event" placeholder="Name"  />
            <span id="rerror"></span>
           
            </td>
 <p id="dateerror" style="color: red;"></p>
            <td>
            <input type="file" name="img_event" id="img_event"   />
            <span id="imageerror"></span>
            </td>

            <td>
            <input type="text" name="nb_event" id="nb_event" placeholder="nbr event"  />
            <span id="nberror"></span>
            </td>

        
            
            
        </div>
        <button type="submit" value="Submit">Submit</button>
        <p style="color: red" id="erreur"></p>
        
    </form>


    <script>

let form = document.getElementById('form');

form.addEventListener('submit' , function(e){
    let mynom = document.getElementById('nom_event');
    let mydesc = document.getElementById('descr');
    let mydated = document.getElementById('dated_event');
    let mydater = document.getElementById('dater_event');
    let mynbr = document.getElementById('nb_event');
    let myimg = document.getElementById('img_event');
    let dateError = document.getElementById('dateerror');
  
    if(mynom.value =='')
  {
    let error = document.getElementById('nomerror');
    error.innerHTML = "Le champs nom est requis";
    error.style.color = 'red';
    e.preventDefault();
  }  
 

  if(mydesc.value =='')
  {
    let error = document.getElementById('deserror');
    error.innerHTML = "Le champs nom est requis";
    error.style.color = 'red';
    e.preventDefault();
  } 
  

  if(mydated.value =='')
  {
    let error = document.getElementById('derror');
    error.innerHTML = "Le champs nom est requis";
    error.style.color = 'red';
    e.preventDefault();
  }   
  

if(mydater.value =='')
{
  let error = document.getElementById('rerror');
  error.innerHTML = "Le champs nom est requis";
  error.style.color = 'red';
  e.preventDefault();
}   

 if (mynbr.value == '') {
    let error = document.getElementById('nberror');
    error.innerHTML = "Le champ nombre de places est requis";
    error.style.color = 'red';
    e.preventDefault();
  } else if (isNaN(mynbr.value) || mynbr.value <= 0) {
    let error = document.getElementById('nberror');
    error.innerHTML = "Le nombre de places doit être un entier positif";
    error.style.color = 'red';
    e.preventDefault();
  } else {
    let error = document.getElementById('nberror');
    error.innerHTML = "";
  }

if(myimg.value =='')
{
  let error = document.getElementById('imageerror');
  error.innerHTML = "Le champs nom est requis";
  error.style.color = 'red';
  e.preventDefault();
}   

  if(mydated.valueAsNumber >= mydater.valueAsNumber)
  {
    dateerror.innerHTML = "La date de fin doit être supérieure à la date de début";
    dateerror.style.color = 'red';
    e.preventDefault();
  }
  else
  {
    dateerror.innerHTML = "";
  }
});
 



      </script>
    
</div>

     <!--<script src="views/app.js"></script>--> 
    <!--<script src="client1.js"></script>-->
</body>
</html>



