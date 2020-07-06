<?php
include('conn.php');
$sname 	= $_POST["st_name"];
$sclass	= $_POST["st_class"];
$sphone	= $_POST["st_phone"];	
$smarks	= $_POST["st_marks"];
//print_r($sname);die;

$query = "INSERT into students (name, class, phone, marks) VALUES ( '$sname', '$sclass', '$sphone', '
			$smarks')";
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