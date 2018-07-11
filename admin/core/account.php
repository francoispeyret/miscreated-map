<?php

include('bdd.php');

$email = $_POST['login_name'];
$password = $_POST['login_pass'];

if($_POST['login_name']) {

	//  Récupération de l'utilisateur et de son pass hashé
	$req = $bdd->prepare('SELECT id, pass FROM accounts WHERE email = :email');
	$req->execute(array('email' => $email));
	$connexion = $req->fetch();

	var_dump($connexion['pass']);
	var_dump($password);
	if($password == $connexion['pass'] && $password!='') {
		$isPasswordCorrect = true;
	} else {
		$isPasswordCorrect = false;
	}

	$error = false;

	if (!$connexion) {
		$error = 'Wrong email or password ! a';
	}
	else {
		if ($isPasswordCorrect) {
			$_SESSION['id'] = $connexion['id'];
			$_SESSION['email'] = $email;
			header('Location: admin.php');
		}
		else {
			$error = 'Wrong email or password ! b';
		}
	}
}
