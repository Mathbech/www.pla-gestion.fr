<?php
function isloggedin(){
	// Vérification de la session de l'utilisateur
	if (empty($_SESSION['id'])){
		//L'utilisateur n'est pas connecté, redirection vers la page de connexion
		header('Location: ./403.php');
		exit();
	}
}
?>