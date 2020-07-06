<?php
include('conn.php');
$stuId = $_POST["id"];

$query = "DELETE FROM students WHERE id = '$stuId' ";
$res = mysqli_query($conn, $query);
if($res)
{
	echo '1';
}
else
{
	echo '0';
}
?>