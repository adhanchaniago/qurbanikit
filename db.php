<?php
	/*	online  */
$host = "localhost";
$user = "root";
$password = "";
$database = "qurbanikit";

		/*Local*/
/*$host = "localhost";
$user = "root";
$password = "";
$database = "qurbanikit";*/

$con=@mysql_connect($host,$user,$password) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db($database,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>
