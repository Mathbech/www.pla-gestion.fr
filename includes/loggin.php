<?php
session_start();
require('./connect.php');
if (!empty($_POST['loggin']) && !empty($_POST['password'])) {
	$username = $_POST['loggin'];
	$password = $_POST['password'];

	//var_dump($username);
	//var_dump($password);
//Préparation requête pour récupérer les id de l'utilisateur
	$q = $conn->prepare("SELECT id, psw, active FROM `users` WHERE `loggin` = :loggin");

	$q->bindValue('loggin', $username);
	//exécution de la requête
	$q->execute();
	$result = $q->fetch(PDO::FETCH_ASSOC);

	// var_dump($result['id']);


	//Si résultat obtenu continuer
	if ($result) {
		$id = $result['id'];
		$active = $result['active'];
		$passwordhash = $result['psw'];
		//Vérification du mot de passe
		if(password_verify($password, $passwordhash)){
			//vérification du compte (actif ou non)
			if($active == 1){
				$_SESSION['connect'] = true;
				$_SESSION['username']= $username;
				$_SESSION['id'] = $id;
				echo "Connexion réussie ";
				echo "id = ", $result['id'];
				header('location: ../dashboard.php');
			}else{
				echo("Votre compte à été désactivé");
			}
		}else {
			echo "Identifiant invalides ou innexistant";
		}
	} else {
		echo "Identifiant invalides ou innexistant";
	}
}
?>