<?php
include '../../inc/php/connection.php';
include '../../inc/php/crudFuncts/select.php';

$login = $_POST['login'];
$pass = $_POST['password'];

$connection = db_connect();
$user = checkLoginUser($connection, $login, $pass);
closeConnection($connection);

if ($user == null){
    $error = "Utilisateur inexistant.";
}
else if($user['Password'] != $pass){
    $error = "Mot de passe incorrect!";
}
else if ($user['idStatu'] != 2){
    $error = "Vous n'etes pas un User simple!";
}

$link = isset($error) ? "login.php?error=$error" : "home.php";
header("Location:$link");

?>