<?php
include_once('conn.php');
$name = $_POST["name"];
$fanme = $_POST["fname"];
$age = $_POST["age"];
$std = $_POST["std"];
$dob = $_POST["dob"];
$doa = $_POST["doa"];
$addType = $_POST["admisonTyp"];
$query = "INSERT INTO `addmision` (s_name, f_name, age, dob, doa, addmission_type, std) VALUES ('$name','$fanme','$age','$dob','$doa','$addType' ,'$std')";
$result = mysqli_query($conn, $query);
if($result)
{
	echo "1"; 
}
else
{
	echo "0";
}
?>