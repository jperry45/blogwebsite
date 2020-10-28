<?php

class User extends Dbh {

	protected function getUser($name) {
		$sql = "SELECT * FROM `User` WHERE firstname = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name]);
		
		return $stmt->fetchAll();
	}

	protected function setUser($firstname, $lastname, $dateofbirth) {
		$sql = "INSERT INTO `User`(firstname,lastname,dateofbirth) VALUES(?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname, $lastname, $dateofbirth]);
	}
}