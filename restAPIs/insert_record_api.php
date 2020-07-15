<?php
header('Content-Type: application/json');
//header('Access-Content-Allow-Origin:*');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Method,Access-Control-Allow-Headers, X-Requested-With');
include ('../conn.php');

$data = json_decode(file_get_contents("php://input"),true);

$name = $data['name']; 
$class = $data['class'];
$phone = $data['phone'];
$marks = $data['marks'];
if(!empty($name && $class && $phone && $marks)){
$insert = "INSERT INTO `students` (name, class, phone, marks) VALUES ('$name', '$class', '$phone',
	 '$marks')";
$result = mysqli_query($conn, $insert);
$res = mysqli_affected_rows($conn);
if($res > 0)
{
	echo json_encode(array('message'=> 'Data inserted', 'status'=> true));
}	 
else
{
	echo json_encode(array('message'=> 'Data not inserted', 'status'=> false));
}
}

else
{
	echo json_encode(array('message'=> 'All fields are required.'));
}
?>