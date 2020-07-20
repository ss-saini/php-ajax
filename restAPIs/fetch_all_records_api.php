<?php
header('Content-Type: application/json');
include('../conn.php');

$select = "SELECT * FROM `students`";
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