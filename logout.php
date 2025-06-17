<?php
session_start();
session_destroy();

session_start();
$message = "Déconnexion réussie";
$_SESSION['successMsg'] = $message;
header('Location: index.php');
exit();
