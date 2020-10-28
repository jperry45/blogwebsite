<?php

class UserView extends User {
	
	public function showUser($name) {
		$results = $this->getUser($name);
		echo "Full name/Date of birth: " . $results[0]['firstname'] . " "
		. $results[0]['lastname'] . " " . $results[0]['dateofbirth'];
	}
}