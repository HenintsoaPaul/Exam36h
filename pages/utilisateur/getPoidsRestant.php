<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/create.php';
 require_once '../../inc/php/crudFuncts/select.php';
 $connection = db_connect();
 $idParcelle = $_POST['idParcelle'];
 $poidsRestant = getPoidsRestantInParcelle($connection, $idParcelle);
 closeConnection($connection);
 echo json_encode($poidsRestant);

?>