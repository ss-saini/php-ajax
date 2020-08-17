<?php include('conn.php');

$name = $_POST['name'];
$subject = $_POST['sub'];
$insert = "INSERT INTO `subjects`(`st_name`, `subject`) VALUES ('$name', '$subject')";
$sql = mysqli_query($conn, $insert);
if($sql){
    //echo "done";
    echo json_encode(array("message"=> "Data inserted", "status" => true));
}
else
{
    echo json_encode(array("message"=> "Data not inserted", "status" => false));
}
?>