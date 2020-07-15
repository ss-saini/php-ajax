<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Method,Access-Control-Allow-Headers');
include ('../conn.php');

$data 	= json_decode(file_get_contents("php://input"),true);
$id 	= $data['id']; 
$name 	= $data['name']; 
$class 	= $data['class'];
$phone 	= $data['phone'];
$marks 	= $data['marks'];

$update = "UPDATE `students` SET name='$name', class='$class', phone ='$phone', marks='$marks' WHERE id = $id";
$result = mysqli_query($conn, $update);
$res = mysqli_affected_rows($conn);
if($res > 0)
{
	echo json_encode(array('message'=> 'Data Updated', 'status'=> true));
}	 
else
{
	echo json_encode(array('message'=> 'Data not Updated', 'status'=> false));
}
?>