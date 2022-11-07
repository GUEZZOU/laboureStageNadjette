<?php
   //require_once('identifier.php');
    require_once('connexiondb.php');
    // $nom=isset($_POST['nom'])?$_POST['nom']:"";
    // $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    // $requete="insert into ChargeClient(nom,prenom) values(?,?))";
    // $params=array($nom,$prenom);
    // $resultat=$pdo->prepare($requete);
    // $resultat->execute($params);
    
    header('location:admin.php');
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        if(!empty($nom) && !empty($prenom )){
            $requete =  $pdo->prepare('insert into ChargeClient(nom, prenom, ) VALUES(:nom,:prenom)');
            $requete->bindValue(':nom',$nom);
            $requete->bindValue(':prenom',$prenom);
            $result=$requete ->execute();
            if(! $result){
                echo"probleme est survenu";
            }else{
                echo"
                  <script type=\"text/javascript\"> alert('bien enregistrer . identifiant:".$pdo->lastInsertId()."')</script>";
            }
         }else
         {
        }
    }
?>