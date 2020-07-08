<?php 
include('conn.php');
$limit_per_page = 4;
$page = '';
if(isset($_POST["page_no"]))
{
	$page = $_POST["page_no"];
}
else
{
	$page = '1';
}

$offset = ($page - 1) * $limit_per_page;
$query = "SELECT * FROM `students` LIMIT  $offset, $limit_per_page";
$res = mysqli_query($conn, $query);
$table = "";
if(mysqli_num_rows ($res)){
	$table .= '<table border="3" class="table table-striped stable" >
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

	$quer = "SELECT * FROM `students`";
	$records = mysqli_query($conn, $quer);
	$total_records = mysqli_num_rows($records);
	$total_pages = ceil($total_records/$limit_per_page);
	$table .='<ul class="pagination">';
		for($i=1; $i <= $total_pages; $i++)
		{
			if($i == $page)
			{
				$active_class = "active";
			}
			else
			{
				$active_class = "";
			}
			$table .="<li class = $active_class ><a id=$i href=''>$i</a></li>";
		}
	$table .='</ul>';

	echo $table;	
}
else
{
	echo "Record is not found";
}
?>