<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","salary");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>