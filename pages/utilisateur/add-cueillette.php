<?php
require_once '../../inc/php/connection.php';
require_once '../../inc/php/crudFuncts/create.php';

$connection = db_connect();

$dateCueillette = $_POST['date'];
$poidsCueilli = $_POST['poidsInput'];
$idParcelle = $_POST['parcelleInput'];
$idCueilleur = $_POST['ceuilleurInput'];

$nbRowsInserted = addCueillette( $connection, $dateCueillette, $poidsCueilli, $idParcelle, $idCueilleur );

closeConnection( $connection );

$message = $nbRowsInserted == 1 ? "success" : "failed";
header( "Location:ceuillette.php?message=$message" );
?>