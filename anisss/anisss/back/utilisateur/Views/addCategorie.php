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
    <title> Categorie</title>
</head>
<body>

<div class="container">
    <form id="form" action="addc.php" class="form" name="form" autocomplete="off" method="POST"  style="z-index: 1; left: 500px; top: 4px; position: absolute; height: 132px; width: 494px" onsubmit="return submitValidation()">
    <pre><h2 id="formName" > Ajouter votre categorie :  </h2></pre>
        <div class="form-control">
            <input type="text" name="nam" id="nam" placeholder="Name"  />
            <td >
            
              <p style="color: red" id="namEr"></p>
            
            </td>
            <small>Error message</small>
            <input textarea name="descr" id="descr" placeholder="Description"  />
            <td >
            
              <p style="color: red" id="deEr"></p>
            
            </td>
            <small>Error message</small>
            
            
        </div>
        <button type="submit" value="Submit">Submit</button>
        <p style="color: red" id="erreur"></p>
        
    </form>
    
</div>

     <!--<script src="views/app.js"></script>--> 
    <!--<script src="client1.js"></script>-->
</body>
</html>



