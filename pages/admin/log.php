<?php
include '../../inc/php/crudFuncts/select.php';
include '../../inc/php/connection.php';

$connection = db_connect();
$user = checkLoginAdmin( $connection, $_POST['login'], $_POST['password'] );
closeConnection( $connection );

if ( $user == null ) {
    $error = "Utilisateur inexistant.";
} else if ( $user['Password'] != $_POST['password'] ) {
    $error = "Mot de passe incorrect!";
} else if ( $user['idStatu'] != 1 ) {
    $error = "Vous n'etes pas admin!";
}

$link = isset( $error ) ? "login.php?error=$error" : "home.php";
header( "Location:$link" );
?>