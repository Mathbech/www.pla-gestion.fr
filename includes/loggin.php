<?php
session_start();
require('./connect.php');
if (!empty($_POST['loggin']) && !empty($_POST['password'])) {
	$username = $_POST['loggin'];
	$password = $_POST['password'];

	//var_dump($username);
	//var_dump($password);

	$q = $conn->prepare("SELECT id, psw FROM `users` WHERE `loggin` = :loggin");

	$q->bindValue('loggin', $username);
	$q->execute();
	$result = $q->fetch(PDO::FETCH_ASSOC);

	var_dump($result['id']);
	
	if ($result) {
		$id = $result['id'];
		$passwordhash = $result['psw'];
		if(password_verify($password, $passwordhash)){
			$_SESSION['connect'] = true;
			$_SESSION['username']= $username;
			$_SESSION['id'] = $id;
			echo "Connexion réussie ";
			echo "id = ", $result['id'];
			header('location: ../dashboard.php');
		}else {
			echo "Identifiant invalides ou innexistant";
		}
	} else {
		echo "Identifiant invalides ou innexistant";
	}
}
?>