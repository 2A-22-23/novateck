<?php
include '../controller/evenementC.php';
$EvenementC = new EvenementC();
$Idev=$_GET["Idev"];
$idcat=$_GET["Idcat"];
if (
    isset($_POST['nom_event'])&&isset($_POST['desc_event'])&&isset($_POST['dated_event'])&&isset($_POST['dater_event'])&&isset($_POST['img_event'])&&isset($_POST['nb_event'])
) {
    
        $Evenement = new Evenement( $_POST['nom_event'],$_POST['desc_event'],$_POST['dated_event'],$_POST['dater_event'],$_POST['img_event'],$_POST['nb_event'],$idcat);
        $EvenementC->modifierevent($Idev,$Evenement);
        header("Location: Listeevenement.php?Idcat=$idcat");

}
$Evenement = $EvenementC->recupererevent($Idev,$idcat);

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
    <form id="form" action="" class="form" name="form" autocomplete="off" method="POST"  style="z-index: 1; left: 500px; top: 4px; position: absolute; height: 132px; width: 494px" onsubmit="return submitValidation()">
    <pre><h2 id="formName" > Modifier votre Evenement :  </h2></pre>
        <div class="form-control">
            <input type="text" name="nom_event" id="nom_event" placeholder="Name"  value="<?php echo $Evenement['nom_event']; ?>">
            
           <td>
            <input textarea name="desc_event" id="descr" placeholder="Description" value="<?php echo $Evenement['desc_event']; ?>" >
            </td>

            <td>
            <input type="date" name="dated_event" id="nom_event" placeholder="Name"  value="<?php echo $Evenement['dated_event']; ?>">
            </td>

            <td>
            <input type="date" name="dater_event" id="nom_event" placeholder="Name" value="<?php echo $Evenement['dater_event']; ?>" >
            </td>

            <td>
            <input type="text" name="img_event" id="nom_event"   value="<?php echo $Evenement['img_event']; ?>">
            </td>

            <td>
            <input type="text" name="nb_event" id="nom_event" placeholder="nbr event"  value="<?php echo $Evenement['nb_event']; ?>">
            </td>

        
            
            
        </div>
        <button type="submit" value="Submit">Submit</button>
        <p style="color: red" id="erreur"></p>
        
    </form>
    
</div>

     <!--<script src="views/app.js"></script>--> 
    <!--<script src="client1.js"></script>-->
</body>
</html>



