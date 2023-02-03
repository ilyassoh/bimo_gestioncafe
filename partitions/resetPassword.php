<?php
include('../actions/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Caissier</title>
    <link rel="stylesheet" href="../js-css/login.css">
</head>
<body>
    <?php
        $sql = "select * from `cafe`";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $logo = $row['Logo'];
            }
        }
    ?>
    <form action="../actions/exDash.php" method="POST" id="resetPassword">
    <img src="../imgs/<?php echo $logo ; ?>" alt="BIMO Logo" width="100">
    <h3>Restaurer Mot de Passe</h3>
    <input type="text" name="title" value="resetPassword" style="display:none;">
    <div class="username">
        <label for="username">Nom : </label><br>
        <input type="text" name="username" id="username" value="<?php echo $_SESSION['username'] ?>" disabled>
    </div>
    <div class="telephone">
        <label for="password">Nouveau Mot de Passe : </label><br>
        <input type="password" name="password" id="password" value="" placeholder="Password" required>
    </div>
    <div class="cpassword">
        <label for="cpassword">Confirmation de nouveau Mot de Passe : </label><br>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirmation" required>
    </div>
    <button onclick="document.getElementById('resetPassword').submit()">Enregistrer</button>
    </form>
</body>
</html>