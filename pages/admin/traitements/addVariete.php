<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

// Verify inputs
if ( !isset( $_POST['nomVariete'] ) ) $error = "nomVariete cannot be null!";
elseif ( !isset( $_POST['occupation'] ) ) $error = "occupation cannot be null!";
elseif ( !isset( $_POST['rendement'] ) ) $error = "rendement cannot be null!";

// Redirect if a value is null
$link = "../insertion-variete.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$nomVariete = $_POST['nomVariete'];
$occupation = $_POST['occupation'];
$rendementParPied = $_POST['rendement'];

// exe query
$connection = db_connect();
$nbRowsAdded = addVariete( $connection, $nomVariete, $occupation, $rendementParPied );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>