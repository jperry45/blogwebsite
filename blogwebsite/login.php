<?php
	include_once 'header.php';
?>
<section class="intro">
	<h2>Welcome Back!</h2>
	<form action="includes/login.inc.php" method="post">
		<input type="text" name="username" placeholder="Username/email">
		<input type="text" name="password" placeholder="Password">
		<button type="submit" name="submit">Log In</button>
	</form>
	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>One or more fields was missing. Please fill in all fields.<p>";
			} else if ($_GET["error"] == "invaliduser") {
				echo "<p>Could not find matching username or email.<p>";
			} else if ($_GET["error"] == "invalidpassword") {
				echo "<p>The password for that user is incorrect.<p>";
			}
		}
	?>
</section>
<?php
	include_once 'footer.php';
?>