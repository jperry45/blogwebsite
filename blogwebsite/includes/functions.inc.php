<?php

function emptyInputSignup($name, $email, $username, $password, $repeatPassword) {
	$result;
	if (empty($name) || empty($email) || empty($username) || empty($password) || empty($repeatPassword)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidUsername($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function pwdMatch($password, $repeatPassword) {
	$result;
	if ($password !== $repeatPassword) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function usernameExists($conn, $username, $email) {
	$sql = "SELECT * FROM `User` WHERE username = ? OR email = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=sqlinitfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	} else {
		return false;
	}
	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password) {
	$sql = "INSERT INTO `User` (name, email, username, password) VALUES (?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../register.php?error=sqlinitfailed");
		exit();
	}

	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../register.php?error=none");
	exit();
}

function emptyInputLogin($username, $password) {
	$result;
	if (empty($username) || empty($password)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $password) {
	$usernameExists = usernameExists($conn, $username, $username);

	if ($usernameExists === false) {
		header("location: ../login.php?error=invaliduser");
		exit();
	}

	$hashedPassword = $usernameExists["password"];
	$checkPassword = password_verify($password, $hashedPassword);

	if ($checkPassword === false) {
		header("location: ../login.php?error=invalidpassword");
		exit();
	} else if ($checkPassword == true) {
		session_start();
		$_SESSION["id"] = $usernameExists["id"];
		$_SESSION["username"] = $usernameExists["username"];
		header("location: ../index.php");
		exit();
	}
}