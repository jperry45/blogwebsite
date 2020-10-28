<?php

class UserController extends User {
	
	public function createUser($firstname, $lastname, $dateofbirth) {
		$this->setUser($firstname, $lastname, $dateofbirth);
	}
}