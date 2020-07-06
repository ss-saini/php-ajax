<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "ajax";

$conn = mysqli_connect($server, $username, $password, $db);
if($conn)
{
	//echo "Database connected successfulluy";
}
else
{
	die("Connection failed:" . mysqli_connect_error());
}
?>