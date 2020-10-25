<?php
$dbHostname="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="codingParty";

$conn=mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die("Connection Failed: " . mysqli_connect_error());
}