<?php

	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {
		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		$cPassword = ($_POST['CPassword']);
		$adress = ($_POST['adress']);

		if ($password != $cPassword)
			$msg = "Controleer je wachtwoord!";
		else {
			$hash = md5($password);
			$conn->query("INSERT INTO user (username,email,password,adress) VALUES ('$username', '$email', '$hash', '$adress')");
			$msg = "Je bent nu klant!";
		}
	}
?>