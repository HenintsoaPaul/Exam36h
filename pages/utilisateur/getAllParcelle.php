<?php
 require_once '../../inc/php/connection.php';
 require_once '../../inc/php/crudFuncts/create.php';
 require_once '../../inc/php/crudFuncts/select.php';
 $connection = db_connect();

 $parcelles = getAllParcelles($connection );
 closeConnection($connection);
 echo json_encode($parcelles);

?>