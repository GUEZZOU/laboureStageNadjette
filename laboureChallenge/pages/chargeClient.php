<?php
require_once('../pages/layout/header.php');
require_once('../pages/layout/head.php');
require_once("../pages/connexiondb.php");
?>
<?php
$requeteChargeClient = "select * from ChargeClient";
$resultatChargeClient = $pdo->query($requeteChargeClient);
$ChargeClient = $resultatChargeClient;
?>
<body>
    <?php
    $requeteCharge = "SELECT nom,prenom,montant, SUM(montant) AS total_honoraire FROM honoraire JOIN chargeclient ON honoraire.idChargeClient = chargeclient.idChargeClient GROUP BY honoraire.idChargeClient  ORDER BY total_honoraire DESC;";
    $result = $pdo->query($requeteCharge);
    ?>

    <div class="page">

        <div class="clock-outer-body">

            <p class="display-time"></p>
            <p class="cabinet">CHALLENGE HONORAIRE</p>
            <p id="display-date" class="display-date"></p>
            <p id="display-day" class="display-date"></p>
        </div>
        <!-- *******************blockProgress_**************** -->
        <div class="container">
            <div class="panel panel-primary barRecherche">
                <div class="panel-heading">Liste des chargés Clientèles</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Photo</th> 
                                <th>NomPrénom</th>
                                <th>Honoraire</th>
                                <th>Honoraire/mois</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($ChargeClient = $result->fetch()) { ?>
                                <tr>
                                    <td></td>
                                    </td>
                                  
                                                                  
                                    </td>
                                    <td><input type="text" value="<?php echo $ChargeClient['nom'] ?>  <?php echo $ChargeClient['prenom'] ?>" class="barCharge"> </input></td>
                                    <td><?php echo $ChargeClient[' montant'] ?></td></tr>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ****************************************************** -->

        <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
        <script src="../js/jsChalleng.js"></script>



        <?php require_once('../pages/layout/footer.php'); ?>