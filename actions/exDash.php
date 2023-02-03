<?php
include('connect.php');
session_start();
// Ce fichier joue un role de très grand importance dans ce projet : dashboard et d'autres pages et se fonctionne en basant sur le contenu de cette variable $titre ; car dans chaque formulaire il y'a ce titre qui contient le titre de l'opération à faire ; je ne sais pas s'il s'agit de bon pratique mais pour mois était utile au lieu  de créer plusieurs pages pour chaque traitemment 
$title = $_POST['title'];
if ($title=='editCafe'){
    $logo = $_FILES['logo']['name'];
    $tmp_name = $_FILES['logo']['tmp_name'];
    $brand = $_POST['brand'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $tlC = $_POST['tlC'];
    $nbrTickets = $_POST['nbrTickets'];
    if (!empty($logo)){
        move_uploaded_file($tmp_name,"../imgs/$logo");
        $conn->query("update `cafe` set Logo='$logo'");
    }
    $conn->query("update `cafe` set Brand='$brand'");
    $conn->query("update `cafe` set Ville='$ville'");
    $conn->query("update `cafe` set Telephone_Cafe='$tlC'");
    $conn->query("update `cafe` set Adresse='$adresse'");
    $conn->query("update `cafe` set Nb_Tickets='$nbrTickets'");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title=='editCaissier'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $nbTickets = $_POST['nbTickets'];
    $conn->query("update `caissiers` set Username='$username',Password='$password', tele_Cais='$telephone' , Nb_Commandes='$nbTickets' where id_Caissier='$id' ");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title=='suppCaissier'){
    $id = $_POST['id'];
    $conn->query("DELETE FROM `caissiers` where id_Caissier='$id' ");
    $conn->query("update `caissiers` set  id_Caissier= id_Caissier-1 where  id_Caissier>'$id' ");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title=='ajoutCaissier'){
    $res = $conn->query("select * from `caissiers`");
    if ($res->num_rows > 0){
        $max = 0 ;
        while ($row = $res->fetch_assoc()){
            if ($row['id_Caissier']+0>$max){
                $max = $row['id_Caissier'];
            }
        }
        $max++;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $conn->query("insert into `caissiers` (id_Caissier,Username,Password,tele_Cais,Nb_Commandes) values ('$max','$username','$password','$phone',0)");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title=='editProd'){
    $idp = $_POST['idp'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $label = $_POST['label'];
    $prix = $_POST['prix'];
    $nb_comm = $_POST['nb_comm'];
    $id_cat = $_POST['id_cat'];
    if (!empty($logoid_cat)){
        move_uploaded_file($tmp_name,"../imgs/$photo");
        $conn->query("update `produits` set Photo='$photo' where id_Prod='$idp' ");
    }
    $conn->query("update `produits` set Label='$label' where id_Prod='$idp'");
    $conn->query("update `produits` set Prix='$prix' where id_Prod='$idp'");
    $conn->query("update `produits` set Nb_commande='$nb_comm' where id_Prod='$idp'");
    $conn->query("update `produits` set id_categorie='$id_cat' where id_Prod='$idp'");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title=='suppProduit'){
    $id = $_POST['id'];
    $res = $conn->query("select * from `produits` where id_Prod='$id' ");
    if ($res->num_rows > 0){
        while ($row = $res->fetch_assoc()){
            $categorie = $row['id_categorie'];
        }
    }
    $conn->query("update categories set Nb_Produits=Nb_Produits-1 where id_Categorie='$categorie'");
    $conn->query("DELETE FROM `produits` where id_Prod='$id' ");
    $conn->query("update `produits` set id_Prod=id_Prod-1 where id_Prod>'$id' ");
    echo'
        <script>
            window.location ="../partitions/dash.php";
        </script>
    ';
}
if ($title == 'ajoutProduit'){
    $label = $_POST['label'];
    $prix = $_POST['prix'];
    $cat = $_POST['cat'];
    $photo = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    if (empty($label)){
        echo'
            <script>
                alert("Entrer le nom de produit !");
                window.location ="../partitions/dash.php";
            </script>
        ';
    }
    if (empty($prix)){
        echo'
            <script>
                alert("Entrer le prix de produit !");
                window.location ="../partitions/dash.php";
            </script>
        ';
    }
    if (empty($photo)){
        echo'
            <script>
                alert("Il faut choisir une image de produit");
                window.location ="../partitions/dash.php";
            </script>
        ';
    }
    if (empty($cat)){
        echo'
            <script>
                alert("Choisir la catégorie de produit !");
                window.location ="../partitions/dash.php";
            </script>
        ';
    }
    else {
        move_uploaded_file($tmp_name,"../imgs/$photo");
        $res = $conn->query("select * from `produits`");
        if ($res->num_rows > 0){
            $max = 0 ;
            while ($row = $res->fetch_assoc()){
                if ($row['id_Prod']+0>$max){
                    $max = $row['id_Prod'];
                }
            }
            $max++;
        }
        if ($cat=='cat1'){
            $catProd = 1;
            $conn->query("update `categories` set Nb_Produits=Nb_Produits+1 where id_Categorie=1  ");
        }
        else if ($cat=='cat2'){
            $catProd = 2 ;
            $conn->query("update `categories` set Nb_Produits=Nb_Produits+1 where id_Categorie=2  ");
        }
        else {
            $catProd = 3 ;
            $conn->query("update `categories` set Nb_Produits=Nb_Produits+1 where id_Categorie=3  ");
        }
        $conn->query("insert into `produits` (id_Prod,Label,Prix,Photo,Nb_Commande,id_categorie) values ('$max','$label','$prix','$photo',0,'$catProd') ");
        echo'
            <script>
                alert("Ajout avec Succès !");
                window.location ="../partitions/dash.php";
            </script>
        ';
    }
}


if ($title=='restauration'){
    $username = $_POST['username'];
    $telephone = $_POST['telephone'];
    $tickets = $_POST['tickets'];
    if ($username==''){
        echo'
            <script>
                alert("Entrer Votre Nom !");
                window.location ="../";
            </script>
        ';
    }
    else if ($telephone==''){
        echo'
            <script>
                alert("Entrer Votre Telephone !");
                window.location ="../";
            </script>
        ';
    }
    else if ($tickets==''){
        echo'
            <script>
                alert("Entrer Nombre de Tickets Servis !");
                window.location ="../";
            </script>
        ';
    }
    else {
        $res = $conn->query("select * from `caissiers` where Username='$username' and tele_Cais='$telephone' and Nb_Commandes='$tickets' ");
        if ($res->num_rows > 0){
            $_SESSION['username']=$username ;
            $_SESSION['telephone']=$telephone ;
            echo'
                <script>
                    window.location ="../partitions/resetPassword.php";
                </script>
            ';
        }
        else {
            echo'
            <script>
                    alert("Désolé, les informations sont incorrects Merci de consulter Votre Manager ");
                    window.location ="../";
                </script>
            ';
        }
    }
}
if ($title=='resetPassword'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password==''){
        echo'
            <script>
                alert("Entrer Mot de passe !");
                window.location ="../partitions/resetPassword.php";
            </script>
        ';
    }
    else if ($cpassword==''){
        echo'
            <script>
                alert("Entrer Confirmation de Mot de passe !");
                window.location ="../partitions/resetPassword.php";
            </script>
        ';
    }
    else if ($password != $cpassword){
        echo'
            <script>
                alert("Les Mots de passe sont différents !!");
                window.location ="../partitions/resetPassword.php";
            </script>
        ';
    }
    else {
        $var1 = $_SESSION['username'];
        $var2 = $_SESSION['telephone'];
        $res = $conn->query("update `caissiers` set Password='$password' where Username='$var1' and tele_Cais='$var2' ");
        echo'
            <script>
                alert("Votre Mot de Passe a été Changé avec succès .");
                window.location ="../";
            </script>
        ';
    }
}
?>