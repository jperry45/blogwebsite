<?php
	include 'includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<?php
		$userObj = new UserView();
		$userObj->showUser("David");

		$userObj2 = new UserController();
		$userObj2->createUser("Kathryn", "Perry", '2005-04-22');
	?>
</body>
</html>