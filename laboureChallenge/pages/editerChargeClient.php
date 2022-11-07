
        <?php
require_once('../pages/layout/header.php');
require_once("../pages/connexiondb.php");
$idC=isset($_GET['idC'])?$_GET['idC']:0;
 $requeteC="select * from ChargeClient where idChargeClient=$idC";
 $resultatC=$pdo->query($requeteC);
$chargeClient=$resultatC->fetch();
 $nom=$chargeClient['nom'];
 $prenom=$chargeClient['prenom'];

?>

        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Iditier le Chargé clientèle :</div>
                <div class="panel-body">
                    <form method="post" action="updateChargeClient.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idC">id du chargé clientèle: <?php echo $idC ?></label>
                            <input type="hidden" name="idC" class="form-control" value="<?php echo $idC ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      