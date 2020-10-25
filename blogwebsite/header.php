<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>CodingParty</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>

	</body>
	<nav>
		<div class="wrapper">
			<a href="index.php"> <img = src="img/image_for_wrapper.png" alt="Alternate label!"></a>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutUs.php">About Us</a></li>
				<li><a href="blogs.php">Blogs</a></li>
				<?php
					if (isset($_SESSION["username"])) {
						echo "<li><a href='profile.php'>Profile page</a></li>";
						echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
					} else {
						echo "<li><a href='register.php'>Register</a></li>";
						echo "<li><a href='login.php'>Log In</a></li>";
					}
				?>
			</ul>
		</div>
	</nav>

<div class="wrapper">
</html>