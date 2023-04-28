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
    font-size: 16px;
    color: #666666;
    margin-bottom: 5px;
    text-shadow: 1px 1px 1px #CCCCCC;
  }

  input[type="text"] {
    padding: 10px;
    border: 1px solid #CCCCCC;
    border-radius: 5px;
    font-size: 16px;
    color: #333333;
    margin-bottom: 15px;
    width: 100%;
    box-sizing: border-box;
    background-color: #F8F8F8;
    box-shadow: inset 2px 2px 3px rgba(0, 0, 0, 0.1);
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: #FFFFFF;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #3e8e41;
  }

  span.error {
    color: #FF0000;
    font-size: 14px;
    display: none;
    margin-top: 5px;
    text-shadow: 1px 1px 1px #CCCCCC;
  }
</style>

<form method="post" action="createVoiture.php">
  <h2>Ajouter voiture</h2>
  
  <div>
    <label for="mat_voiture">Matricule de voiture :</label>
    <input type="text" id="mat_voiture" name="register-mat_voiture" required>
    <span class="error" id="mat_voiture_error">Veuillez saisir une matricule de voiture valide.</span>
  </div>
  
  <div>
    <label for="availability">Disponibilité :</label>
    <input type="text" id="availability" name="register-availability" required>
    <span class="error" id="availability_error">Veuillez saisir une disponibilité valide.</span>
  </div>

  <div>
    <label for="nbr_d_place">Nombre de place :</label>
    <input type="text" id="nbr_d_place" name="register-nbr_d_place" required>
    <span class="error" id="nbr_d_place_error">Veuillez saisir un Nombre de place valide.</span>
  </div>
  
  <input type="submit" value="Ajouter">
</form>
