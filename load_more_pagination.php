<?php
include_once('conn.php');
$limit_of_records = 4;
if(isset($_POST['page_no']))
{
	$page = $_POST['page_no'];
}
else
{
	$page = '0';
}
$query = "SELECT * FROM `students` LIMIT  $page, $limit_of_records";
$res = mysqli_query($conn, $query);
if(mysqli_num_rows($res)){
	$table = "";
	$table .= "<tbody>";
	while ($row = mysqli_fetch_assoc($res)) {
			$last_id = $row['id'];
			$table .= "<tr>
						<td>$row[id]</td>
						<td>$row[name]</td>
						<td>$row[class]</td>
						<td>$row[phone]</td>
						<td>$row[marks]</td>
					  </tr>";
		}
	$table .= "</tbody>		
		<tbody id='pagibtn'>
				<tr>
					<td colspan='5'>
						<button class='btn btn-primary lodmore' data-id=$last_id >Load More</button>
					</td>
				</tr>
			<tbody>";
	echo $table;	
}
else
{
	echo "";
}
mysqli_close($conn);
?>
