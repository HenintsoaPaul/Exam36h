<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';


$link = "../insertion-categorie.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$nom = $_POST['nomInput'];

// exe query
$connection = db_connect();
$nbRowsAdded = addCategorieDepense( $connection, $nom );
closeConnection( $connection );

// redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>