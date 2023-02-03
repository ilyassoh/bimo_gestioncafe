<?php
include('actions/connect.php');
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BIMO | Login</title>
  <!-- Css File  -->
  <link rel="stylesheet" href="js-css/login.css">
</head>
<body>
  <!-- Js file  -->
  <script src="./js-css/recherche.js"></script>

  <!-- Formulaire pour Entrée des Caissiers  -->
  <div class="login-page" id="login-page">
    <div class="form">
      <?php
          $sql = "select * from `cafe`";
          $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                $logo = $row['Logo'];
              }
            }
      ?>
      <form id="myForm" action="actions/login.php" method="POST" class="login-form">
          <div class="logo">
            <img src="imgs/<?php echo $logo ; ?>" alt="BIMO Logo" width="150" height="150">
          </div>
          <div class="user">
              <input type="text" name="username" placeholder="username" required/>
              <div class="icon"> <img src="imgs/user.png" alt="user" width="17px"> </div>
          </div>
          <div class="psd">
              <input type="password" name="password" placeholder="password" required/>
              <div class="icon"> <img src="imgs/password.png" alt="user" width="17px"> </div>
          </div>
          <button onclick="document.getElementById('myForm').submit()">login</button>
          <p onclick="oublier()"><a>Oublier mote de passe</a></p>
      </form>
    </div>
  </div>

  <!-- Formulaire pour Oublie de mot de passe  -->
  <form action="actions/exDash.php" method="POST" id="oublier" style="display:none">
    <img src="imgs/<?php echo $logo ; ?>" alt="BIMO Logo" width="100">
    <h3>Restaurer Mot de Passe</h3>
    <input type="text" name="title" value="restauration" style="display:none;">
    <div class="username">
      <label for="username">Nom : </label><br>
      <input type="text" name="username" id="username">
    </div>
    <div class="telephone">
      <label for="telephone">Téléphone : </label><br>
      <input type="text" name="telephone" id="telephone">
    </div>
    <div class="tickets">
      <label for="tickets">Nbr Tickets Servis : </label><br>
      <input type="number" name="tickets" id="tickets">
    </div>
    <button onclick="document.getElementById('oublier').submit()">Envoyer</button>
  </form>




</body>
</html>
