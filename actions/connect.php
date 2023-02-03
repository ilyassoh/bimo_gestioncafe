<!-- Ce fichier Nous permet de connecter avec la base de données et on va lui faire appel dans chaque page dont on aura besoin de connecter avec la base de données  -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd_name ="cafe";
$conn = new mysqli($servername, $username, $password,$bd_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>