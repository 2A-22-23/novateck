<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier un covoiturage</title>
    <style>
        /* CSS styling for form inputs and labels */
        body {
            background-image: url('header-bg.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #444;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px;
            border-radius: 10px;
            background: linear-gradient(145deg, #f0f0f0, #e6e6e6);
            box-shadow: 10px 10px 20px #cbced1, -10px -10px 20px #ffffff;
        }

        h2 {
            text-align: center;
            margin-bottom: 50px;
            font-size: 36px;
        }

        label {
            margin-bottom: 15px;
            font-size: 20px;
            display: block;
        }

        input[type="text"],
        input[type="datetime-local"],
        input[type="number"] {
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 20px;
            margin-top: 30px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s ease;
        }

        input[type="submit"]:hover {
            background-color: #388E3C;
        }

        input:required {
            box-shadow: none;
        }

        input:invalid {
            box-shadow: none;
            border: 2px solid red;
        }

        input:focus:invalid {
            outline: none;
        }
        
    </style>

</head>
<body>
    <?php
    // Include the controller and retrieve the covoiturage record by id_covoiturage
    include '../Controller/covoituragC.php';
    $covoiturageC = new covoiturageC();
    $id_covoiturage = $_GET['id_covoiturage'];
    $covoiturage = $covoiturageC->recuperercovoiturage($id_covoiturage);
    ?>

    <form method="post" action="modifiercovoiturage.php">
        <h2>Modifier un covoiturage</h2>
        <div>
            <label for="zone_d">Zone de depart :</label>
            <input type="text" name="zone_d" value="<?php echo $covoiturage['zone_d']; ?>" required>
        </div>
        <div>
            <label for="zone_a">Zone d'arrivee :</label>
            <input type="text" name="zone_a" value="<?php echo $covoiturage['zone_a']; ?>" required>
        </div>
        <div>
            <label for="nbr_place_d">Nombre de place disponible:</label>
            <input type="text" name="nbr_place_d" value="<?php echo $covoiturage['nbr_place_d']; ?>"required>
        </div>
        <div>
            <label for="date">Date:</label>
            <input type="datetime-local" name="date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($covoiturage['date'])); ?>"required>
</div>
<div>
            <label for="prix">Prix:</label>
            <input type="text" name="prix" value="<?php echo $covoiturage['prix']; ?>"required>
        </div>
        <div>
            <label for="mat_v">Matricule de voiture:</label>
            <input type="text" name="mat_v" value="<?php echo $covoiturage['mat_v']; ?>"required>
        </div>
<div>
<input type="hidden" name="id_covoiturage" value="<?php echo $covoiturage['id_covoiturage']; ?>">
<input type="submit" value="Modifier">
</div>
</form>

</body>
</html>
