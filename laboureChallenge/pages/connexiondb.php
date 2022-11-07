 <?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=challenge",
        "root","");
         $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //  echo"connected";
}catch (PDOException $e){
    die('Erreur : ' . $e->getMessage()); // die('Erreur : impossible de se connecter à la base de donnée'); 
}

  ?> 
  