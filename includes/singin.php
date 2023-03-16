<?php

require('./connect.php');

if (!empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
    $email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	var_dump($username);
	var_dump($password);
    var_dump($email);

	$q = $conn->prepare("INSERT INTO users (loggin, mail, psw, active) VALUES (:username, :mail, :psw, :active)");
	$q->bindValue(':username', $username);
    $q->bindValue(':mail', $email);
	$q->bindValue(':psw', $password);
	$q->bindValue('active', true);
	$result = $q->execute();


	if ($result) {
		echo "inscription réussie";
		header('Location: ../index.php');
	}
}

?>