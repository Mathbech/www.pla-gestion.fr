<?php
session_start();

// Suppression de la session de l'utilisateur
session_unset();
session_destroy();

// Redirection vers la page de connexion
header('Location: ../index.php');
exit();
?>