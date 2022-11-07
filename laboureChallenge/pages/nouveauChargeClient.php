<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
require_once('connexiondb.php');

// $requete="select * from  ChargeClient";
//  $resultat=$pdo->query($requete);
// ***********************
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    if (!empty($nom) && !empty($prenom)) {
        $requete =  $pdo->prepare('INSERT INTO ChargeClient(nom, prenom) VALUES(:nom,:prenom)');
        $requete->bindValue(':nom', $nom);
        $requete->bindValue(':prenom', $prenom);
        $resultat =  $requete->execute();
        if (!$resultat) {
            echo "probleme est survenu";
        } else {
            echo "
                  <script type=\"text/javascript\"> alert('bien enregistrer . identifiant:" . $pdo->lastInsertId() . "')</script>";
        }
    } else {
    }
}

?>


<div class="container">

    <div class="panel panel-primary barRecherche">
        <div class="panel-heading">Les infos du nouveau chargé clientèle :</div>
        <div class="panel-body">
            <form method="post" action="insertChargeClient.php" class="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" placeholder="Nom" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" placeholder="Prénom" class="form-control" />
                </div>
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-save"></span>
                    Enregistrer
                </button>

            </form>
        </div>
    </div>
</div>






