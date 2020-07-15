<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
include('../conn.php');

//you have to give id through postmen to run this api
$id = json_decode(file_get_contents("php://input"), true);
$stu_id = $id['stuId'];

$select = "SELECT * FROM `addmision` WHERE id = '$stu_id' ";
$result = mysqli_query($conn, $select);
if(mysqli_num_rows($result) > 0 ){
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($data, JSON_PRETTY_PRINT);
}
else
{
	echo json_encode(array('message'=> 'No record found.', 'status'=> false));
}
?>
