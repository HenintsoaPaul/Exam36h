<?php
require_once 'inc/php/connection.php';
require_once 'inc/php/crudFuncts/select.php';

$connection = db_connect();

$poidsRestants = getPredictionPoidsRestantParParcelle( $connection, $_POST['dateFin'] );

closeConnection( $connection );

echo json_encode( $poidsRestants );
?>