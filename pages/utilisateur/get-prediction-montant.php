<?php
require_once 'inc/php/connection.php';
require_once 'inc/php/crudFuncts/select.php';

$connection = db_connect();

$montant = getPredictionMontant( $connection, $_POST['dateFin'] );

closeConnection( $connection );

echo json_encode( $montant );
?>