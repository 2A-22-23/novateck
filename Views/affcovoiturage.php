<?php
include '../Controller/covoituragC.php';
$userC = new covoiturageC();
$listeUserC = $userC->affichercovoiturage();
if(isset($_POST["type"]))
{
  if($_POST["type"] == "tri"){
    $listeUserC = $userC->affichertri();
  }
  else if($_POST["type"] == "search"){
    $listeUserC = $userC->afficherRecherche($_POST["search"]);
  }
}
else {
  $listeUserC = $userC->affichercovoiturage();
}

if(!empty($listUserC)) {
  foreach ($listUserC as $covoiturge) {
    
    
  }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Liste de Covoiturages</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            background-color: #4e73df;
            color: #fff;
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #2e59d9;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-danger {
            background-color: #e74a3b;
        }

        .btn-danger:hover {
            background-color: #c23321;
        }
    </style>
</head>

<body>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Liste de Covoiturages</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
            <form action="" method="POST">
                        <input type="submit" class="btn" name="type" value="tri">
                      </form>
                      <form action="" method="POST">
                      <input type="text" class="form-control" id="search" placeholder="Nombre de place" name="search">
                        <input type="submit" class="btn" name="type" value="search">
                      </form>
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID Covoiturage</th>
                            <th>Zone de depart</th>
                            <th>Zone d'arriee</th>
                            <th>Nombre de place disponible</th>
                            <th>Date</th>
                            <th>Prix</th>
                            <th>Matricule de voiture</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($listeUserC as $covoiturge) { ?>
                            <tr>
                                <td>
                                    <div class="form-check form-check-muted m-0">
                                    </div>
                                </td>

                                <td><?php echo $covoiturge['id_covoiturage']; ?></td>
                                <td><?php echo $covoiturge['zone_d']; ?></td>
                                <td><?php echo $covoiturge['zone_a']; ?></td>
                                <td><?php echo $covoiturge['nbr_place_d']; ?></td>
                                <td><?php echo $covoiturge['date']; ?></td>
                                <td><?php echo $covoiturge['prix']; ?></td>
                                <td><?php echo $covoiturge['mat_v']; ?></td>

                                <td><a href="supprimercovoiturage.php?id_covoiturage=<?php echo $covoiturge['id_covoiturage']; ?>" class="btn">Supprimer</a></td>
                                <td><a href="affichermodifier.php?id_covoiturage=<?php echo $covoiturge['id_covoiturage']; ?>" class="btn">Modifier</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                    <td>
                        <td><a href="ajoutercov.php" class="btn">Ajouter</a></td>
                    </td>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
