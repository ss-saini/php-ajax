<?php 
include('conn.php');

if(empty($_POST['stid'])) {
$select = "SELECT * FROM `students`";
$sql = mysqli_query($conn, $select);
$rows = mysqli_fetch_all($sql, MYSQLI_ASSOC);
echo json_encode($rows);
}
else if(isset($_POST['stid'])){
    $id = $_POST['stid'];
    $allId = implode($id , ",");
    $delete = "DELETE FROM `students` WHERE id IN ('$allId')";
    $result = mysqli_query($conn, $delete);
    if($result){
        echo json_encode(['message'=> 'Record deleted successfully', 'status'=> true]);
    }
    else 
    {
        echo json_encode(['message'=> 'Record not deleted!!! Please check something is wrong', 'status'=> false]);
    }
}    
?>