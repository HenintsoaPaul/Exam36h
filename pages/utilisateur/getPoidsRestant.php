<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/create.php';
 require_once '../../inc/php/crudFuncts/select.php';
 $connection = db_connect();
 $idParcelle = $_POST['idParcelle'];
 $date = $_POST['date'];

 $poidsRestant = getPoidsRestantInParcelle($connection, $idParcelle, $date, $date );
 closeConnection($connection);
 echo json_encode($poidsRestant);

?>