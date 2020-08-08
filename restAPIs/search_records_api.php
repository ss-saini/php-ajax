<?php
header('Content-Type:application/json');
include('../conn.php');

$search_value = json_decode(file_get_contents("php://input"),true);
$srchValue = $search_value["sname"];

//passing search value through url
//$stu_name = isset($_GET['sname']) ? $_GET['sname'] : die("Enter some value in url");

/*if($srchValue){*/
	$search = "SELECT * FROM `students` WHERE name LIKE '$srchValue%' ";
	$result = mysqli_query($conn, $search);
	if(mysqli_num_rows($result) > 0){
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($data);
	}
	else
	{
		echo json_encode(array('message'=> 'no records found', 'status'=> false));
	}
/*}
else
{
	echo json_encode(array('message'=> 'Enter some value for search!!!'));
}*/
?>