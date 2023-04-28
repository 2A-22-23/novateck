<style>
  body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #F5F5F5;
    background-image: url(header-bg.jpg);
    background-size: 1600px;
  }

  form {
    max-width: 500px;
    margin: 50px auto;
    padding: 40px;
    border-radius: 20px;
    background-color: #FFFFFF;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #CCCCCC;
  }

  h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 36px;
    color: #333333;
    text-shadow: 2px 2px 2px #CCCCCC;
  }

  label {
    font-size: 24px;
    color: #666666;
    margin-bottom: 10px;
    text-shadow: 1px 1px 1px #CCCCCC;
  }

  input[type="text"],
  input[type="number"],
  input[type="datetime-local"] {
    padding: 15px;
    border: 1px solid #CCCCCC;
    border-radius: 10px;
    font-size: 20px;
    color: #333333;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
    background-color: #F8F8F8;
    box-shadow: inset 2px 2px 3px rgba(0, 0, 0, 0.1);
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: #FFFFFF;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 24px;
    margin-top: 20px;
    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  span.error {
    color: #FF0000;
    font-size: 16px;
    display: none;
    margin-top: 10px;
    text-shadow: 1px 1px 1px #CCCCCC;
  }
</style>

<form method="post" action="ajoutercovoiturage.php">
  <h2>Ajouter Covoiturage</h2>
  
  <div>
    <label for="zone_d">Zone de départ</label>
    <input type="text" id="zone_d" name="register-zone_d" required>
    <span class="error" id="zone_d_error">Veuillez saisir une zone de départ valide.</span>
  </div>
  
  <div>
    <label for="zone_a">Zone d'arrivée</label>
    <input type="text" id="zone_a" name="register-zone_a" required>
    <span class="error" id="zone_a_error">Veuillez saisir une zone d'arrivée valide.</span>
  </div>
  
  <div>
    <label for="nbr_place_d">Nombre de places disponible</label>
    <input type="number" id="nbr_place_d" name="register-nbr_place_d" min="1" max="8" required>
    <span class="error" id="nbr_place_d_error">Veuillez saisir un nombre de places valide .</span>
  </div>
  
  <div>
    <label for="date">Date et heure</label>
    <input type="datetime-local" id="date" name="register-date" required>
    <span class="error" id="date_error">Veuillez saisir une date et une heure valides.</span>
  </div>
  <div>
    <label for="prix">Prix</label>
    <input type="number" id="prix" name="register-prix"  required>
    <span class="error" id="prix_error">Veuillez saisir un prix valide .</span>
  </div>
  <div>
    <label for="mat_v">Matricule</label>
    <input type="number" id="mat_v" name="register-mat_v"  required>
    <span class="error" id="mat_v_error">Veuillez saisir un matricule valide .</span>
  </div>
  
  <input type="submit" value="Ajouter">
</form>
