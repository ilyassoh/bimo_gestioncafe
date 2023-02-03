<?php
include('../actions/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIMO | Dashboard</title>
    <!-- Css File  -->
    <link rel="stylesheet" href="../js-css/dash.css">
</head>
<body>
    <!-- JS Files  -->
    <script src="../js-css/dash.js"></script>
    <script src="../js-css/forms.js"></script>

    <!-- Entete  -->
    <h1>Dashboard</h1>
    <div class="ret">
        <a href="./gene-ticket.php"><button>Retourner</button></a>
    </div>



    <!-- ******************** Tableau de café BIMO ******************************** -->
    <table class="table" id="cafe">
        <tr>
            <td colspan="8"><h2> Les données de Café : </h2></td>
        </tr>
        <tr>
            <th>Logo</th>
            <th>Brand</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Telephone</th>
            <th>Nombre Tickets</th>
            <th onclick="editCafe()" rowspan="2"><img src="../imgs/edit.png" alt="edit" width="50px"></th>
        </tr>
        <?php
        $sql = "select * from `cafe`";
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $logo = $row['Logo'];
                    $brand = $row['Brand'];
                    $adresse = $row['Adresse'];
                    $ville = $row['Ville'];
                    $tlC = $row['Telephone_Cafe'];
                    $nbrTickets = $row['Nb_Tickets'];
                ?>
                <tr>
                    <td><img src="../imgs/<?php echo $logo;?>" alt="logo" width="55px"></td>
                    <td><?php echo $brand;?></td>
                    <td><?php echo $adresse;?></td>
                    <td><?php echo $ville;?></td>
                    <td><?php echo $tlC;?></td>
                    <td><?php echo $nbrTickets;?></td>
                </tr>
                <?php
                }
            }
        ?>
    </table>


    <!-- Formulaire de edition de tableau cafe  -->
    <form id="editCafe" action="../actions/exDash.php" method="POST" enctype="multipart/form-data">
        <h2>Informations : </h2>
        <input type="text" name="title" value="editCafe" style="display:none;">
        <div class="logo">
            <div class="img">
                <label for="logo">Logo : </label><br>
                <input type="file" name="logo" value="<?php echo $logo ; ?>">
            </div>
            <img src="../imgs/<?php echo $logo;?>" alt="logo" width="65px">
        </div>
        <br>
        <div class="brand">
            <label for="brand">Brand : </label><br>
            <input id="brand" type="text" name="brand" value="<?php echo $brand;?>">
        </div>
        <br>
        <div class="adresse">
            <label for="adresse">Adresse: </label><br>
            <input type="text" name="adresse" value="<?php echo $adresse;?>">
        </div>
        <br>
        <div class="ville">
            <label for="ville">Ville : </label><br>
            <input type="text" name="ville" value="<?php echo $ville;?>">
        </div>
        <br>
        <div class="tlC">
            <label for="tlC">Telephone : </label><br>
            <input type="text" name="tlC" value="<?php echo $tlC;?>">
        </div>
        <br>
        <div class="nbrTickets">
            <label for="nbrTickets">Nb Tickets : </label><br>
            <input type="text" name="nbrTickets" value="<?php echo $nbrTickets;?>">
        </div>
        <button id="enrCafe" onclick="document.getElementById=('editCafe').submit()">Enregistrer</button>
    </form>


    <!-- **************************** Tableau des Caissiers ************************************** -->
    <table class="table" id="caissiers">
        <h2> Les Caissiers : </h2>
        <tr>
            <td colspan="7" align="right"><span onclick="ajoutCaissier()">✚</span></td>
        </tr>
        <tr>
            <th>ID_caissier</th>
            <th>Nom</th>
            <th>Password</th>
            <th>Telephone</th>
            <th>Nombre de commandes</th>
            <th>editer</th>
            <th>supprimer</th>
        </tr>
        <?php
            $sql = "select * from `caissiers`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $Id = $row['id_Caissier'];
                    $Nom = $row['Username'];
                    $Password = $row['Password'];
                    $Telephone = $row['tele_Cais'];
                    $ndecom = $row['Nb_Commandes'];
                ?>
                <tr id="<?php echo $Id;?>">
                    <td><?php echo $Id;?></td>
                    <td><?php echo $Nom;?></td>
                    <td><?php echo $Password;?></td>
                    <td><?php echo $Telephone;?></td>
                    <td><?php echo $ndecom;?></td>
                    <td>
                        <img onclick="editCaiss('<?php echo $Id ; ?>')" src="../imgs/edit.png" alt="edit" width="30px">
                    </td>
                    <td>
                        <img onclick="suppCaiss('<?php echo $Id ; ?>')" src="../imgs/suppr.png" alt="suppr" width="30px">
                    </td>
                </tr>
                <?php
                } 
            }
        ?>
    </table>
    
    <!-- Dans ce container se créent les formilaires our editer sue les caissiers ou les produits .... comme aussi on peut faire la meme chose pour le formulaire de cafe ...  -->
    <div id="container1">

    </div>
    
        

    <!-- ***************************** Tableau des Catégories ******************************************** -->
    <table class="table" id="categories">
        <tr>
            <td colspan=6><h2> Les Catégories : </h2></td>
        </tr>
        <tr>
            <th>id_categorie</th>
            <th>Label</th>
            <th>nombre_produit</th>
            <th>photo</th>
            <th>editer</th>
            <th>supprimer</th>
        </tr>
        <?php
            $sql = "select * from `categories`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $Id = $row['id_Categorie'];
                    $label = $row['Label'];
                    $nbrProd = $row['Nb_Produits'];
                    $photo = $row['photo'];
                ?>
                <tr>
                    <td><?php echo $Id;?></td>
                    <td><?php echo $label;?></td>
                    <td><?php echo $nbrProd;?></td>
                    <td><img src="../imgs/<?php echo $photo;?>" alt="categorie" width="55px"></td>
                    <td>
                        <img src="../imgs/edit.png" alt="edit" width="30px">
                    </td>
                    <td>
                        <img src="../imgs/suppr.png" alt="suppr" width="30px">
                    </td>
                </tr>
                <?php
                } 
            }
        ?>
    </table>

    <!-- ************************ Tableau des Commandes ******************************** -->
    <table class="table" id="commande">
        <tr>
            <td colspan=3><h2>Les Commandes : </h2></td>
        </tr>
        <tr>
            <th>id_commande</th>
            <th>date_commande</th>
            <th>Nb_Produits</th>
        </tr>
        <tr>
        <?php
            $sql = "select * from `commande`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $Id = $row['id_Commande'];
                    $date = $row['date_Commande'];
                    $nbrProd = $row['Nb_Produits'];
                ?>
                    <tr>
                        <td><?php echo $Id;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $nbrProd;?></td>
                    </tr>
                <?php
                } 
            }
        ?>
    </table>
    <!-- ************** Tableau de Ligne_Commande ********************* -->
    <table class="table" id="ligne_commande">
        <tr>
            <td colspan=4><h2>Ligne_Commande : Historique</h2></td>
        </tr>
        <tr>
            <th>Id_Ligne</th>
            <th>Num_Commande</th>
            <th>id_Produit</th>
            <th>quantite</th>
        </tr>
        <?php
            $sql = "select * from `ligne_commande`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $num_com = $row['Num_Commande'];
                    $Id = $row['Label_Produit'];
                    $quantite = $row['quantite'];
                ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $num_com;?></td>
                        <td><?php echo $Id;?></td>
                        <td><?php echo $quantite;?></td>
                    </tr>
                <?php
                } 
            }
        ?>
    </table>
    <!-- ********************** Tableau des Produits ******************** -->
    <table class="table" id="produits">
        <h2>Les Produits : </h2>
        <tr>
            <td colspan="8" align="right"><span onclick="ajoutProduit()">✚</span></td>
        </tr>
        <tr> 
            <th>id_Prod</th>
            <th>Label</th>
            <th>Prix</th>
            <th>Photo</th>
            <th>Nb_Commande</th>
            <th>id_categorie</th>
            <th>editer</th>
            <th>supprimer</th>
        </tr>
        <?php
            $sql = "select * from `produits`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id_prod = $row['id_Prod'];
                    $label = $row['Label'];
                    $price = $row['Prix'];
                    $photo = $row['Photo'];
                    $nbr_commande = $row['Nb_Commande'];
                    $id_cat = $row['id_categorie'];
                ?>
                    <tr id="<?php echo 'p'.$id_prod; ?>">
                        <td><?php echo $id_prod;?></td>
                        <td><?php echo $label;?></td>
                        <td><?php echo $price;?></td>
                        <td><img src="../imgs/<?php echo $photo;?>" alt="product" width="55px"></td>
                        <td><?php echo $nbr_commande;?></td>
                        <td><?php echo $id_cat;?></td>
                        <td>
                            <img onclick="editProd(<?php echo $id_prod ; ?>)" src="../imgs/edit.png" alt="edit" width="30px">
                        </td>
                        <td>
                            <img onclick="suppProd(<?php echo $id_prod ;?>)" src="../imgs/suppr.png" alt="suppr" width="30px">
                        </td>
                    </tr>
                <?php
                } 
            }
        ?>
    </table>
    <br><br><br>





    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
            margin-left : 20%;
            margin-bottom : 2% ;
            margin-top : 2% ;
        }
        /* table h2{
            color : blue ;
            border : solid 1.2px gray ;
            border-radius : 20px ;
        } */
        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table tr:nth-child(even){background-color: #f2f2f2;}
        table tr:hover {background-color: #ddd;}
        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #086788;
            color: white;
        }
        table tr td:first-child{
            font-weight : 600 ;
        }
        table tr td img:hover{
            transform : scale(1.5);
        }
        /* #caissiers tr:first-child td , #produits tr:first-child td{
            padding : 0px ;
        }
        #caissiers tr:first-child td, #produits tr:first-child td{
            display : flex ;
            align-items : center ;
        } */
        #caissiers tr:first-child td span , #produits tr:first-child td span{
            font-size : 29px ;
            font-weight : 800 ;
            width : 125px;
            margin-right : 2% ;
            color : green ;
        }
        #caissiers tr:first-child td h2 , #produits tr:first-child td h2{
           text-align : center ;
        }
        #caissiers tr:first-child td span:hover , #produits tr:first-child td span:hover {
            cursor: pointer;
            color : rgb(49, 17, 49) ;
        }
    </style>

</body>
</html>