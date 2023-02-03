<?php
session_start();
include('connect.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from `caissiers` where Username='$username' and Password='$password' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION['username']=$row['Username'];
        echo'
        <script>
            window.location ="../partitions/gene-ticket.php";
        </script>
        ';
    }
}
else {
    echo'
        <script>
            alert("Les Informations sont Incorrects !");
            window.location ="../index.php";
        </script>
    ';
}

?>