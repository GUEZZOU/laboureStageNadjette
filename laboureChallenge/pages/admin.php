<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<!-- ********************************************************* -->
<?php
$requeteChargeClient = "SELECT  DISTINCT *FROM  honoraire INNER JOIN chargeClient ON honoraire.idChargeClient= chargeclient.idChargeClient";
$resultatChargeClient = $pdo->query($requeteChargeClient);
 $HonoraireMois = $resultatChargeClient
?>

<!-- ********************************************************* -->
<div class="container">
  <div class="panel panel-primary barRecherche">
    <div class="panel-heading"></div>
    <div class="panel-body">
      <form method="get" action="admin.php" class="form-inline">
        <a href="insertEffectifChargeClient.php">
          <span class="glyphicon glyphicon-plus"></span>
          Saisir les effectifs du chargés Clientèles
        </a>
        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        <a href="nouveauChargeClient.php">
          <span class="glyphicon glyphicon-plus"></span>
          Nouveau chargé Clientèle
        </a>
        <?php //if ($_SESSION['user']['role'] == 'ADMIN') { 
        ?>
        <!-- <a href="nouveauChargeClient.php">
          <span class="glyphicon glyphicon-plus"></span>
          Nouveau chargé Clientèle
        </a>  -->
        <?php //} 
        ?>
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
            <th>Date</th>
            <th>Honoraire</th>
            <th>Honoraire/mois</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($ChargeClient = $resultatChargeClient->fetch()) { ?>
            <tr>
              <td><?php echo $ChargeClient['idChargeClient'] ?> </td>
              <td><?php echo $ChargeClient['nom'] ?> </td>
              <td><?php echo $ChargeClient['prenom'] ?> </td>
              <td>
                <?php echo $ChargeClient['date'] ?>&nbsp;&nbsp;
                <a title="editer la date" href="editerDate.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
                <a title="supprimer la date" onclick="return confirm('Etes vous sur de vouloir supprimer')" href="supprimerDate.php?idC=<?php //echo $ChargeClient['idChargeClient'] 
                                                                                                                                        ?>">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
              <td>
                <?php echo $ChargeClient['montant'] ?>&nbsp;&nbsp;
                <a title="editer l'honoraire" href="editerMontat.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
                <a title="supprimer l'honoraire" onclick="return confirm('Etes vous sur de vouloir supprimer')" href="supprimerMontat.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-trash"></span>
                </a>
              </td>
              <td><?php echo$ChargeClient['sommeHono'] ?> </td>
              <td>
                <a title="editer Chargé client" href="editerChargeClient.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
                  <span class="glyphicon glyphicon-edit "></span>
                </a>
                &nbsp;
                <a title="supprimer Chargé client" onclick="return confirm('Etes vous sur de vouloir supprimer le Chargé Clientèle')" href="supprimerChargeClient.php?idC=<?php echo $ChargeClient['idChargeClient'] ?>">
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