<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

if ( !isset( $_POST['surface'] ) ) $error = "surface cannot be null!";
elseif ( !isset( $_POST['idVariete'] ) ) $error = "idVariete cannot be null!";

$link = "../insertion-parcelle.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$surface = $_POST['surface'];
$idVariete = $_POST['idVariete'];

// exe query
$connection = db_connect();
$nbRowsAdded = addParcelle( $connection, $surface, $idVariete );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>