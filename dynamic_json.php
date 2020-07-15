<?php include_once('conn.php'); 

$query = "SELECT * FROM `addmision`";
$res = mysqli_query($conn, $query);
$data = mysqli_fetch_all($res, MYSQLI_ASSOC);
$jsonData = json_encode($data, JSON_PRETTY_PRINT);
$fileName = "json_" . date('d-m-y') . ".json";
if(file_put_contents("jsonDynamicData/{$fileName}", "$jsonData")){
    echo  $fileName . " Created Successfully";
}
else
{
    echo "Some Error Occured";
}
?>