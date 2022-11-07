<?php require_once('../pages/layout/header.php');
require_once("../pages/connexiondb.php"); ?>

<!-- *********************************************** -->
<?php
//if (isset($_POST['submit'])) {
    //echo"tu as cliqué";//pour verifier que le boton submit fonction en test apret on le'eface

    //on declaire deux varible pou le pseudo et le mot de pass
    session_start();
    if (isset($_SESSION['erreurLogin']))
        $erreurLogin = $_SESSION['erreurLogin'];
    else {
        $erreurLogin = "";
    }
    session_destroy();
?>
<?php
// if(!empty($_POST)){
// if($Auth->login($_POST)){

// }else{
//     echo'Mauvi identifion';
// }
// }
?>
    <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-primary barRecherche">
            <div class="panel-heading">Se connecter :</div>
            <div class="panel-body">
                <form method="post" action="seConnecter.php" class="form">
                <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>
                    <div class="form-group">
                        <label for="login">Login :</label>
                        <input type="text" name="login" placeholder="Login" class="form-control" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe :</label>
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Se connecter
                    </button>
                    <p class="text-right">
                        <a class="pwdOublie" href="InitialiserPwd.php">Mot de passe Oublié</a>
                        &nbsp &nbsp
                        <a class="pwdOublie" href="nouvelUtilisateur.php">Créer un compte</a>
                    </p> 
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="../js/jsChalleng.js"></script>

<?php
//   require_once('../pages/layout/footer.php');
?>