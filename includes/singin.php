<?php

require('./connect.php');

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if ($pass == $cpassword) {
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		if(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ " , $email)){

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
	}else{
		echo('L\'adresse mail n\'est pas valide');
	}
	}else{
		echo('Les mots de passes ne correspondent pas!');
	}
}

?>