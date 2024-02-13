<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/select.php';

 $connection = db_connect();

 $dateDebut = $_POST['dateDebut'];
 $dateFin = $_POST['dateFin'];

 $paiement = getBeneficeInPeriod($connection, $dateDebut, $dateFin );

 closeConnection($connection);

 echo json_encode($paiement);

?>