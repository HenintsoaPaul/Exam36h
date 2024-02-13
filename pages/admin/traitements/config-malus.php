<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

// Verify inputs
if ( !isset( $_POST['malusInput'] ) ) $error = "poids cannot be null!";
elseif ( !isset( $_POST['dateInput'] ) ) $error = "date cannot be null!";

// Redirect if a value is null
$link = "../insertion-config-malus.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$malus = $_POST['malusInput'];
$date = $_POST['dateInput'];

// exe query
$connection = db_connect();
$nbRowsAdded = addMallus( $connection, $malus, $date );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");


?>