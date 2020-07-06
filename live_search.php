<?php
include('conn.php');

$search = $_POST["search"];
//print_r($search);
$query = "SELECT * FROM `students` WHERE name LIKE '%$search%' || class LIKE '%$search%' || phone LIKE '%$search%' || marks LIKE '%$search%' ";
$res = mysqli_query($conn, $query);
$table = "";
if(mysqli_num_rows ($res)){
	$table = '<table border="3" class="table table-striped stable" >
				<tr>
					<th>sr.no</th>
					<th>Name</th>
					<th>Class</th>
					<th>Phone</th>
					<th>Marks</th>
					<th>Action</th>
				</tr>';
		while ($row = mysqli_fetch_assoc($res)) {
			$table .= "<tr>
						<td>$row[id]</td>
						<td>$row[name]</td>
						<td>$row[class]</td>
						<td>$row[phone]</td>
						<td>$row[marks]</td>
						<td><button class='btn btn-danger del' value=$row[id]>Delete</button>
						<a href='edit_records.php?id=$row[id]' class='btn btn-info edit'>Edit</a>
						</td>
					  </tr>";
		}
	$table .="</table>";
	echo $table;	
}
else
{
	echo "Record is not found";
}
?>