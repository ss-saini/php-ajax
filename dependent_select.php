<?php
include('conn.php');

$data = "";
if($_POST['selData'] ==  ""){
$sel = "SELECT * FROM `country`";
$res = mysqli_query($conn, $sel);
	while ($row = mysqli_fetch_assoc($res)) {
	    $data .="<option value='$row[id]'>$row[co_name]</option>";
	}
}
else if($_POST['selData'] ==  'state'){
	$id = $_POST['targetId'];
	$select = "SELECT * FROM `state` WHERE country_id = '$id' ";
	$result = mysqli_query($conn, $select);
	$data .= "<option value=''>Select State</option>";
	while ($row = mysqli_fetch_assoc($result)) {
    $data .="<option value='$row[id]'>$row[st_name]</option>";
	}
}
else if($_POST['selData'] == 'city'){
	$id = $_POST['targetId'];
	$select = "SELECT * FROM `city` WHERE state_id = '$id' ";
	$result = mysqli_query($conn, $select);
	$data .= "<option value=''>Select City</option>";
	while ($row = mysqli_fetch_assoc($result)) {
    $data .="<option value='$row[id]'>$row[city_name]</option>";
	}
}	
echo $data;


