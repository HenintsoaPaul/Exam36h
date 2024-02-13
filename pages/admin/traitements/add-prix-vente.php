<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

if ( !isset( $_POST['surface'] ) ) $error = "surface cannot be null!";
elseif ( !isset( $_POST['idVariete'] ) ) $error = "idVariete cannot be null!";

$link = "../insertion-parcelle.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$montant = $_POST['montantInput'];
$idVariete = $_POST['idVariete'];
$date = $_POST['dateInput'];
// exe query
$connection = db_connect();
$nbRowsAdded = addPrixVente( $connection, $montant, $idVariete, $date );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>