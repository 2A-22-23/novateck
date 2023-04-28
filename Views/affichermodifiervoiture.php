<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier une voiture</title>
    <style>
        /* CSS styling for form inputs and labels */
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
            color: #444;
        }

        label {
            margin-bottom: 15px;
            font-size: 20px;
            color: #444;
            display: block;
        }

        input[type="text"] {
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            margin-bottom: 30px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            color: #444;
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
		
		/* CSS styling for header background */
        body {
            background-image: url('header-bg.jpg');
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
        }
    </style>
</head>
<body>
    <?php
    // Include the controller and retrieve the voiture record by mat_voiture
    include '../Controller/VoitureC.php';
    $voitureC = new VoitureC();
    $mat_voiture = $_GET['mat_voiture'];
    $voiture = $voitureC->recupererVoiture($mat_voiture);
    ?>

    <form method="post" action="modifiervoiture.php">
        <h2>Modifier une voiture</h2>
        <div>
            <label for="availability">Availability :</label>
            <input type="text" name="availability" value="<?php echo $voiture['availability']; ?>"required>
        </div>
        <div>
            <label for="nbr_d_place">Nobmre de place  :</label>
            <input type="text" name="nbr_d_place" value="<?php echo $voiture['nbr_d_place']; ?>"required>
        </div>
        <div style="text-align: center;">
            <input type="hidden" name="mat_voiture" value="<?php echo $voiture['mat_voiture']; ?>">
            <input type="submit" value="Modifier">
        </div>
    </form>
</body>
</html>
