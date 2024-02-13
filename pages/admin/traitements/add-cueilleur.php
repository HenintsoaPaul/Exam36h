<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

// Verify inputs
if ( !isset( $_POST['naissance'] ) ) $error = "naissance cannot be null!";
elseif ( !isset( $_POST['nomInput'] ) ) $error = "nomInput cannot be null!";
elseif ( !isset( $_POST['genreInput'] ) ) $error = "genreInput cannot be null!";

// Redirect if a value is null
$link = "../insertion-cueilleur.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$dtn = $_POST['naissance'];
$nom = $_POST['nomInput'];
$genre = $_POST['genreInput'];

// exe query
$connection = db_connect();
$nbRowsAdded = addCueilleur( $connection, $nom, $dtn, $genre );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>