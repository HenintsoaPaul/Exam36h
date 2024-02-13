<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/select.php';

 $connection = db_connect();

 $idCueilleur = $_POST['idCueilleur'];
 $dateDebut = $_POST['dateDebut'];
 $dateFin = $_POST['dateFin'];

 $paiement = getPoidsTotalOfCueilleurInPeriod($connection, $idCueilleur, $dateDebut, $dateFin );

 closeConnection($connection);

 echo json_encode($paiement);

?>