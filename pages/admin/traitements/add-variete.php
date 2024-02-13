<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';

// Verify inputs
if ( !isset( $_POST['nomVariete'] ) ) $error = "nomVariete cannot be null!";
elseif ( !isset( $_POST['occupation'] ) ) $error = "occupation cannot be null!";
elseif ( !isset( $_POST['rendement'] ) ) $error = "rendement cannot be null!";
elseif ( !isset( $_POST['moisInput'] ) ) $error = "mois cannot be null!";

// Redirect if a value is null
$link = "../insertion-variete.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$mois = $_POST['moisInput'];
$nomVariete = $_POST['nomVariete'];
$occupation = $_POST['occupation'];
$rendementParPied = $_POST['rendement'];

// exe query
$connection = db_connect();
$idVariete = addVariete( $connection, $nomVariete, $occupation, $rendementParPied );
$count = 0;
for ( $i = 0; $i < count($mois); $i ++ ) {
    $nbRowInserted = addRegeneration( $connection, $mois[$i], $idVariete );
    if ( $nbRowInserted !== 1 ) {
        $error = "failed";
        break;
    }
    $count ++;
}
$error = $count === count($mois) ? "success" : "failed";

closeConnection( $connection );

header( "Location:$link=$error" );

?>