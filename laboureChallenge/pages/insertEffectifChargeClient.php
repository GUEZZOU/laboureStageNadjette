<?php
    require_once('../pages/layout/header.php');
    require_once('../pages/layout/head.php');
    require_once("../pages/connexiondb.php");
?>
<?php
var_dump($_POST);
 //******vérifier que le bouton ajouter a bien été cliqué
if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date= $_POST['date'];
    $montant= $_POST['montant'];
//    $moisHonoraire= $_POST['moisHonoraire'];

    //******verifier que tous les champs ont été remplis
    if(!empty($nom) && !empty($prenom ) && !empty($date) && !empty($montant))//&& !empty($moisHonoraire)
    {

     //*****requête d'ajout
        $requeteChargeClient =  "SELECT distinct nom,prenom,montant, SUM(montant) AS total_honoraire FROM honoraire JOIN chargeclient ON honoraire.idChargeClient = chargeclient.idChargeClient GROUP BY honoraire.idChargeClient;";
        $requete = $pdo->query($requeteChargeClient);
        
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':prenom',$prenom);
         $requete->bindValue(':date',$date);
        $requete->bindValue(':montant',$montant);
        // $requete->bindValue(':moisHonoraire',$moisHonoraire);
        $result=$requete ->execute();
        if(! $result){
            echo"probleme est survenu";
            header("location: index.php");
        }else{
            echo"
              <script type=\"text/javascript\"> alert('bien enregistrer . identifiant:".$pdo->lastInsertId()."')</script>";
        }
     }else
     {
         echo "Veuillez remplir tous les champs !";
    }
}
 ?>

        
        <div class="container">
                       
             <div class="panel panel-primary barRecherche">
                <div class="panel-heading">Les effectifs du  chargé clientèle :</div>
                <div class="panel-body">
                    <form method="post" action="insertEffectifChargeClient.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" value="<?php echo $nom ?>" placeholder="Nom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom"  value="" placeholder="Prénom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="date">Date :</label>
                            <input type="date" name="date" placeholder="date" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="montant">Honoraire :</label>
                            <input type="number" name="montant" placeholder="" class="form-control"/>
                        </div>
                        <input type="submit" name="submit" id="" value=" Enregistrer"class="btn btn-success"></span> </input><br>
					</form>
                </div>
            </div>   
        </div> 





        //SELECT SUM(montant) AS sommeHono,idChargeClient FROM honoraire GROUP BY idChargeClient;
        // $requete =  $pdo->prepare('INSERT INTO  honoraire INNER JOIN chargeClient ON honoraire.idChargeClient (nom, prenom, montant, date) VALUES(:nom,:prenom,:montant,:date)');