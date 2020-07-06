<?php
include('conn.php');
$id = $_POST["s_id"];
$name = $_POST["s_name"];
$class = $_POST["s_class"];
$phone = $_POST["s_phone"];
$marks = $_POST["s_marks"];

$quer="UPDATE `students` SET name='$name', class='$class',phone='$phone',marks='$marks' WHERE id='$id'";
$result=mysqli_query($conn, $quer);
if($result)
{
	echo 1;
}
else
{
	echo 0;
}
?>