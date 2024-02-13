<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/select.php';

 $connection = db_connect();
 $dateFin = $_POST['dateFin'];
 $dateDebut = $_POST['dateDebut'];

 $poids = getCoutRevientParKilo($connection, $dateDebut, $dateFin );
 closeConnection($connection);
 echo json_encode($poids);

?>