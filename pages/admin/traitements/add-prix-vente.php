<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

if ( !isset( $_POST['montantInput'] ) ) $error = "montant cannot be null!";
elseif ( !isset( $_POST['idVariete'] ) ) $error = "idVariete cannot be null!";
elseif ( !isset( $_POST['dateInput'] ) ) $error = "date cannot be null!";


$link = "../insertion-prix-vente.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$montant = $_POST['montantInput'];
$idVariete = $_POST['idVariete'];
$date = $_POST['dateInput'];
// exe query
$connection = db_connect();
$nbRowsAdded = addPrixRevient( $connection, $montant, $date, $idVariete );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>