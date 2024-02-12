<?php
require_once 'inc/php/connection.php';
require_once 'inc/php/crudFuncts/create.php';

// Verify inputs
if ( !isset( $_POST['nomVariete'] ) ) $error = "nomVariete cannot be null!";
elseif ( !isset( $_POST['occupation'] ) ) $error = "occupation cannot be null!";
elseif ( !isset( $_POST['rendement'] ) ) $error = "rendement cannot be null!";

// Redirect if a value is null
if ( isset( $error ) ) {
    header( "Location:insertionVariete.php?error=$error" );
}

$nomVariete = $_POST['nomVariete'];
$occupation = $_POST['occupation'];
$rendementParPied = $_POST['rendement'];

// exe query
$connection = db_connect();
$nbRowsAdded = addVariete( $connection, $nomVariete, $occupation, $rendementParPied );
closeConnection( $connection );

// redirection
if (isset($nbRowsAdded) && $nbRowsAdded === 1) {
    header( "Location:insertionVariete.php?error=insert_variete_success" );
}
else {
    header( "Location:insertionVariete.php?error=insert_variete_failed" );
}

?>