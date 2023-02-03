<?php
include('connect.php');

$nbrP = $_POST['nbrP'];
$CAISSIER = $_POST['CAISSIER'];
$temps = $_POST['temps'];
$sql = "select * from `cafe`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Nb_Tickets=$row['Nb_Tickets']+1;
    }
}

// Suand on génére Ticket on a besoin de faire plusieurs traitement insersions et updates dans les différents tableaux de la base de données : 



// ******Cafe******
$conn->query(" update cafe set Nb_Tickets=Nb_Tickets+1 ");

// ******Caissiers******
$conn->query(" update caissiers set Nb_Commandes=Nb_Commandes+1 where Username='$CAISSIER' ");

// ******Ccommande******
$conn->query(" insert into `commande` values ('$Nb_Tickets','$temps','$nbrP','$CAISSIER') ");

// ******Produits et ligne de commande ******
for ($i=1 ; $i<=$nbrP ; $i++){
    $label = $_POST['Prd'.$i];
    $quantite = $_POST['Qnt'.$i];
    $conn->query(" update produits set Nb_Commande=Nb_Commande+'$quantite' where Label='$label'");
    $conn->query("insert into `ligne_commande` (Num_Commande,Label_Produit,quantite) values ('$Nb_Tickets','$label','$quantite') ");
}

echo'
    <script>
        window.location ="../partitions/gene-ticket.php";
    </script>
';


?>