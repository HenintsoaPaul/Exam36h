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
$mois = $_POST['moisInput'];

// exe query
$connection = db_connect();
$idVariete = addVariete( $connection, $nomVariete, $occupation, $rendementParPied );
for ($i=0; $i < count($mois) ; $i++) { 
    addRegeneration($connection, $mois[$i],  $idVariete);
}
closeConnection( $connection );

// redirection
header("Location:$link");

?>