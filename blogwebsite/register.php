<?php
	include_once 'header.php';
?>
<section class="intro">
	<h2>Join the club</h2>
	<form action="includes/register.inc.php" method="post">
		<input type="text" name="name" placeholder="Your name here">
		<input type="text" name="email" placeholder="Email">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="repeatPassword" placeholder="Repeat Password">
		<button class="button" name="submit" type="submit">Register</button>
	</form>
	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>One or more fields was missing. Please fill in all fields.<p>";
			} else if ($_GET["error"] == "invalidusername") {
				echo "<p>Please choose a proper username.<p>";
			} else if ($_GET["error"] == "invalidemail") {
				echo "<p>Email does not match required format.<p>";
			} else if ($_GET["error"] == "nonmatchingpassword") {
				echo "<p>Please double check that both passwords match.<p>";
			} else if ($_GET["error"] == "usernametaken") {
				echo "<p>Sorry, that username is taken.<p>";
			} else if ($_GET["error"] == "sqlinitfailed") {
				echo "<p>Something went wrong. Please try again.<p>";
			} else if ($_GET["error"] == "none") {
				echo "<p>Registration successful!<p>";
			}
		}
	?>
</section>
<?php
	include_once 'footer.php';
?>