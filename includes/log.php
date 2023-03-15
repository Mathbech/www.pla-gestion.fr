<?php
function isloggedin(){
	// Vérification de la session de l'utilisateur
	if (!isset($_SESSION['connect']) || $_SESSION['connect'] !== true) {
		//L'utilisateur n'est pas connecté, redirection vers la page de connexion
		header('Location: ./403.php');
		exit();
	}
}
?>