<?php require_once('../pages/layout/header.php');
require_once("../pages/connexiondb.php");
$login = isset($_GET['login']) ? $_GET['login'] : "";
$requeteUser="select * from utilisateurs where login like '%$login%'";
$resultatUser=$pdo->query($requeteUser);

?>

<div class="container">

    <div class="panel panel-primary barRecherche">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>login</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($user = $resultatUser->fetch()) { ?>
                        <tr class="<?php echo $user['etat'] == 1 ? 'success' : 'danger' ?>">
                            <td><?php echo $user['login'] ?> </td>
                            <td><?php echo $user['email'] ?> </td>
                            <td><?php echo $user['role'] ?> </td>
                            <td>
                                <a href="#?idUser=>">                                       
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                &nbsp;&nbsp;
                             <a onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')" href="#?idUser==>">
                                    <span class="glyphicon glyphicon-trash"></span>
                              </a>
                                &nbsp;&nbsp;
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>

</div>