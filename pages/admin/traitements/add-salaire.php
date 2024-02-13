<?php
require_once '../../../inc/php/connection.php';
require_once '../../../inc/php/crudFuncts/create.php';


$link = "../insertion-salaire.php?message";
if ( isset( $error ) ) {
    header( "Location:$link=$error" );
}

$montant = $_POST['montantInput'];
$date = $_POST['dateInput'];
// exe query
$connection = db_connect();
$nbRowsAdded = addSalaire( $connection, $montant, $date );
closeConnection( $connection );

//redirection
$message = $nbRowsAdded === 1 ? "success" : "failed";
header("Location:$link=$message");

?>