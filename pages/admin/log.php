<?php
include '../../inc/php/crudFuncts/select.php';
include '../../inc/php/connection.php';

$connection = db_connect();
$user = checkLoginAdmin( $connection, $_POST['login'], $_POST['password'] );
closeConnection( $connection );

if ( $user['Password'] != $_POST['password'] ) {
    $error = "Mot de passe incorrect!";
} else if ( $user['idStatu'] != 1 ) {
    $error = "Vous n'etes pas admin!";
} else if ( $user == null ) {
    $error = "Utilisateur inexistant.";
}

$link = isset( $error ) ? "login.php?error=$error" : "home.php";
header( "Location:$link" );
?>