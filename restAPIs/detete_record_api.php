<?php
header('Content-Type: application/json');
header('Access-Content-Allow-Method: DELETE');
header('Access-Content-Allow-Headers: Content-Type,Access-Content-Allow-Method,Access-Content-Allow-Headers');
include ('../conn.php');
$data = json_decode(file_get_contents("php://input"), true);

$stu_id = $data['stId'];
$delete = "DELETE FROM `students` WHERE id = '$stu_id'";
$result = mysqli_query($conn, $delete);
$row = mysqli_affected_rows($conn);
if($row){
	echo json_encode(array('message'=> 'Record deleted successfully', 'status'=> true));
}
else
{
	echo json_encode(array('message'=> 'Record not deleted!!! Please check something is wrong', 'status'=> false));
}
?>