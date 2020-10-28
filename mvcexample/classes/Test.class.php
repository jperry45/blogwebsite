<?php

class Test extends Dbh{

	public function getUser() {
		$sql = "SELECT * FROM `User`";
		$stmt = $this->connect()->query($sql);
		while($row = $stmt->fetch()) {
			echo $row['firstname'] . '<br>';
		}
	}

	public function getUserStmt($firstname, $lastname) {
		$sql = "SELECT * FROM `User` WHERE firstname = ? AND lastname = ?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname, $lastname]);
		$names = $stmt->fetchAll();

		foreach ($names as $name) {
			echo $name['dateofbirth'] . '<br>';
		}
	}

	public function setUserStmt($firstname, $lastname, $dateofbirth) {
		$sql = "INSERT INTO `User`(firstname,lastname,dateofbirth) VALUES(?,?,?)";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$firstname,$lastname,$dateofbirth]);
	}
}