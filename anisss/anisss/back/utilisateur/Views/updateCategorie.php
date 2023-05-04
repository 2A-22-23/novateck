<?php
include '../controller/categorieC.php';
$userC = new categorieC();
$Idcat = $_GET["Idcat"];
$user = $userC->recupererservice($Idcat);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<style>
      body{
background-image:url(../reservation.jpg);
background-size: 1600px;


        }
  
    </style>
<body>
<form action="modCategorie.php?Idcat=<?php echo $Idcat ?>" method='POST' <table class="form-style" enctype="multipart/form-data"
>
                      <div class="form-group">
                        <label for="nom">nom </label>
                        <input type="text" class="form-control"  name="nam" value="<?php echo $user['nam'];?>">
                      </div>
                      <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" class="form-control"  name="descr" value="<?php echo $user['descr'];?>">
                      </div>
                     
                   
                    
                      <button type="submit" class="btn btn-primary mr-2">modifier</button>
                      <button type="submit" >  <a href="ListCategories.php" class="btn">Retour</a></button>
                    
                  </form>
</body>

</html>