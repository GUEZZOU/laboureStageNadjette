<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<!-- ********************************************************* -->
<?php
require_once("connexiondb.php");

$nomPrenom = isset($_GET['nomPrenom']) ? $_GET['nomPrenom'] : "";


// $size = isset($_GET['size']) ? $_GET['size'] : 5;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $offset = ($page - 1) * $size;

$requeteChargeClient = "select * from ChargeClient";

// if ($idhonoraire == 0) {
//     $requeteChargeClient = "select  idChargeClient,nom,prenom,
//                 from ChargeClient as f,stagiaire as s
//                 where f.idFiliere=s.idFiliere
//                 and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
//                 order by idStagiaire
//                 limit $size
//                 offset $offset";

//     $requeteCount = "select count(*) countS from stagiaire
//                 where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%'";
// } else {
//     $requeteStagiaire = "select idStagiaire,nom,prenom,nomFiliere,photo,civilite 
//                 from filiere as f,stagiaire as s
//                 where f.idFiliere=s.idFiliere
//                 and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
//                 and f.idFiliere=$idfiliere
//                  order by idStagiaire
//                 limit $size
//                 offset $offset";

//     $requeteCount = "select count(*) countS from stagiaire
//                 where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
//                 and idFiliere=$idfiliere";
// }

$resultatHonoraireAnnual = $pdo->query($requeteHonoraireAnnual);
$resultatChargeClient = $pdo->query($requeteChargeClient);
// $resultatCount = $pdo->query($requeteCount);

// $tabCount = $resultatCount->fetch();
// $nbrChargeClient = $tabCount['countS'];
// $reste = $nbrChargeClient % $size;
// if ($reste === 0)
//     $nbrPage = $nbrChargeClient / $size;
// else
//     $nbrPage = floor($nbrChargeClient / $size) + 1;
?>

<!-- ********************************************************* -->
<div class="container">
  <div class="panel panel-primary barRecherche">
    <div class="panel-heading">Rechercher des chargés clientèle.</div>
    <div class="panel-body">
      <form method="get" action="chargeClient.php" class="form-inline">
        <div class="form-group">
          <input type="text" name="login" placeholder="login" class="form-control" value="" />
        </div>
        <button type="submit" class="btn btn-success">
          <span class="glyphicon glyphicon-search"></span>
          <!--glyphicon glyphicon-search econn de font dans le fichier -->
          Chercher...
        </button>
      </form>
   
  
  
 
  <!-- <div class="panel-body">Tableau des chargés clientèles </div> -->
                &nbsp;&nbsp;
                <?php if ($_SESSION['user']['role'] == 'ADMIN') { ?>
                    <a href="nouveauStagiaire.php">
                        <span class="glyphicon glyphicon-plus"></span>
                        Nouveau chargé Clientèle
                    </a>
                <?php } ?>
            </form>
        </div>
    </div>
 

    <div class="panel panel-primary">
        <div class="panel-heading">Liste des chargés Clientèles</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id chargeClient</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Honoraire</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($ChargeClient = $resultatChargeClient->fetch()) { ?>
                        <tr>
                            <td><?php echo $ChargeClient['idChargeClient'] ?> </td>
                            <td><?php echo $ChargeClient['nom'] ?> </td>
                            <td><?php echo $ChargeClient['prenom'] ?> </td>
                            <td><?php echo $ChargeClient[' mantant '] ?> </td>
                            <td>
                                <a href="editerChargeClient.php?idC=">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Etes vous sur de vouloir supprimer le Chargé Clientèle')" href="supprimerChargeClient.php?idC=">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>

                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="../js/jsChalleng.js"></script>

<?php require_once('../pages/layout/footer.php'); ?>