<?php
	include_once 'header.php';
?>
<section class="intro">
	<h1><?= isset($_SESSION["username"]) ? "Logged in as " . $_SESSION["username"] : "Please sign in or register!"?></h1>
	<p>Welcome to my website. Made by Joshua Perry.</p>
</section>
<?php
	include_once 'footer.php';
?>