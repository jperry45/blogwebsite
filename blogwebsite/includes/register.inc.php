<?php

if (isset($_POST["submit"])) {
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$repeatPassword = $_POST["repeatPassword"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($name, $email, $username, $password, $repeatPassword) !== false) {
		header("location: ../register.php?error=emptyinput");
		exit();
	}
	if (invalidUsername($username) !== false) {
		header("location: ../register.php?error=invalidusername");
		exit();
	}
	if (invalidEmail($email) !== false) {
		header("location: ../register.php?error=invalidemail");
		exit();
	}
	if (pwdMatch($password, $repeatPassword) !== false) {
		header("location: ../register.php?error=nonmatchingpassword");
		exit();
	}
	if (usernameExists($conn, $username, $email) !== false) {
		header("location: ../register.php?error=usernametaken");
		exit();
	}

	createUser($conn, $name, $email, $username, $password);

} else {
	header("location: ../register.php");
	exit();
}