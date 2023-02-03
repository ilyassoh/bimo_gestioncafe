<?php
session_start();
include('../actions/connect.php');
// Obtenir les informations de cafe 
$sql = "select * from `cafe`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $logo = $row['Logo'];
        $brand = $row['Brand'];
        $adresse = $row['Adresse'];
        $ville = $row['Ville'];
        $tlC = $row['Telephone_Cafe'];
        $nbrTickets = $row['Nb_Tickets'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../js-css/gene-ticket.css">
    <title>Document</title>
</head>
<body onload="categorie('cat1')">

    <!-- *******************  Pour la Ticket ****************** -->
    <div id="parTicket1">
            <div class="ticket" id="ticket">
                <div id="part1">
                    <img src="../imgs/<?php echo $logo; ?>" alt="Logo Cafe" width="60px">
                    <h2><?php echo $brand; ?></h2>
                    <p><?php echo $ville.', '.$adresse;?></p>
                    <h4><?php echo $tlC;?></h4>
                </div>
                <div id="part2">
                    <div class="caiss">
                        <span>Caissier : </span>
                        <span id="CAISSIER"><?php echo $_SESSION['username']; ?></span>
                    </div>
                    <div class="numT">
                        <span>Ticket Num : </span>
                        <span><?php echo $nbrTickets+1; ?></span>
                    </div>
                    <div id="temps">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <p>-------------------------------------------</p>
                <div id="part3">
                    <table id="listProd">
                        <tr>
                            <th>Qte</th>
                            <th>Produit</th>
                            <th>Total</th>
                        </tr>
                    </table>
                </div>
                <p>-------------------------------------------</p>
                <div id="part4">
                    <div id="nbProduits">
                        <span>Nbr Produits</span>
                        <span></span>
                    </div>
                    <div id="tva">
                        <span>TVA</span>
                        <span>20 %</span>
                    </div>
                    <div id="gTotal">
                        <span>Total Global</span>
                        <span>0</span>
                    </div>
                </div>
                <p>------------------------------------------</p>
                <div id="part5">
                    <h5>Bonne Appétit</h5>
                </div>
            </div>
    </div>


    

    <!-- ****************  Header  ************** -->
    <header>
        <img src="../imgs/<?php echo $logo ;?>" alt="logo cafe" width="60px">
        <form action="../actions/logout.php" method="POST" id="logout" style="display: none;"></form>
        <span onclick="document.getElementById('logout').submit()" >
        <img src="../imgs/logout.png" alt="logout" width="30px">
        </span>
    </header>




    <!-- ********************  Content Of Page   ********************* -->
    <div class="content">
        <div class="choix">
            <div class="caissier">
                <img src="../imgs/user.png" alt="caissier" width="15px">
                <span><?php echo $_SESSION['username']; ?></span>
            </div>
            <br><br>
            <div class="prod-choisis" id="prod-choisis">

            </div>
            <div class="bilan">
                <div class="part1">
                    <p>Nbr Produits :</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p id="nbr-produits">00</p>
                </div>
                <div class="part2">
                    <p>Total:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p id="global-total">00.00</p>
                </div>
            </div>
        </div>

        <div class="produits">
            <div class="head">
                <p>Liste Produits</p>
                <div class="rechercher">
                    <input type="text" id="rechercher" onkeyup="rechercher()">
                    <button><img src="../imgs/chercher.png" alt="Recherche Icon" width="30px"></button>
                </div>
            </div>
            <div class="produit" id="produits">
                <div class="pcat" id="pcat1">
                    <?php 
                        $sql = "select * from produits where id_categorie=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $i=1 ;
                        while($row = $result->fetch_assoc()) {
                        $data = $row['id_categorie']*10 + $i; 
                        $labelle = $row['Label'] ; 

                    ?>
                    <div class="prod" id="<?php echo $labelle;?>"<?php echo'onclick="ajouter('.$data.')"';?>>
                        <img src="../imgs/<?php echo $row['Photo'];?>" alt="prod" width="70px">
                        <p id="label<?php echo $data;?>"><?php echo $row['Label'];?></p>
                        <p id="prix<?php echo $data;?>"><?php echo $row['Prix'];?> dh</p>
                    </div>
                <?php $i++; }}?>
                </div>
                <div class="pcat" id="pcat2" style="display:none;">
                    <?php 
                        $sql = "select * from produits where id_categorie=2";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $i=1 ;
                        while($row = $result->fetch_assoc()) {
                        $data = $row['id_categorie']*10 + $row['id_Prod']; 
                    ?>
                    <div class="prod" <?php echo'onclick="ajouter('.$data.')"';?>>
                        <img src="../imgs/<?php echo $row['Photo'];?>" alt="prod" width="70px">
                        <p id="label<?php echo $data;?>"><?php echo $row['Label'];?></p>
                        <p id="prix<?php echo $data;?>"><?php echo $row['Prix'];?> dh</p>
                    </div>
                <?php $i++; }}?>
                </div>
                <div class="pcat" id="pcat3" style="display:none;">
                    <?php 
                        $sql = "select * from produits where id_categorie=3";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $i=0;
                        while($row = $result->fetch_assoc()) {
                        $data = $row['id_categorie']*10 + $row['id_Prod']; 
                    ?>
                    <div class="prod" <?php echo'onclick="ajouter('.$data.')"';?>>
                        <img src="../imgs/<?php echo $row['Photo'];?>" alt="prod" width="70px">
                        <p id="label<?php echo $data;?>"><?php echo $row['Label'];?></p>
                        <p id="prix<?php echo $data;?>"><?php echo $row['Prix'];?> dh</p>
                    </div>
                <?php $i++; }}?>
                </div>
            </div>
        </div>
        <div class="categories">
            <p>Les Catégories</p>
            <div class="cat">
            <?php
                $sql = "select * from categories";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="catn" id="cat<?php echo $row['id_Categorie'];?>" onclick="categorie('cat<?php echo $row['id_Categorie'];?>')">
                            <img src="../imgs/<?php echo $row['photo'];?>" alt="categorie <?php echo $row['Label'];?>" width="110px">
                            <h4><?php echo $row['Label'];?></h4>
                        </div>
                        <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>


    <!-- ******************   Footer    *********************** -->
    <footer>
        <button id="generer" onclick="pushTicket()">Génerer Ticket</button>
        <button id="dashboard" onclick="window.location='dash.php'">Dashboard</button>
    </footer>

    <!-- JS Links  -->
    <script src="../js-css/gene-ticket.js"></script>
    <script src="../js-css/list.js"></script>
    <script src="../js-css/ticket.js"></script>
    <script src="../js-css/recherche.js"></script>
</body>
</html>