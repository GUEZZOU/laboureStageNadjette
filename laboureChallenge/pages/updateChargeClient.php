<?php
require_once('connexiondb.php');
    $idC=isset($_POST['idC'])?$_POST['idC']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:chargeClient.php');

?>