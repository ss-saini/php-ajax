<?php
if(isset($_POST['submit'])){
	if(file_exists('jsonDynamicData/inserted_jsonData_throguh_form.json'))
	{

		$current_data = file_get_contents('jsonDynamicData/inserted_jsonData_throguh_form.json');
		$array = json_decode($current_data, true);
		$newData = array(
					'name'	=> $_POST['name'],
					'class'	=> $_POST['class'],
					'phone'	=> $_POST['phone'],
					'marks'	=> $_POST['marks'],
				);
		$array[] = $newData;
		$json_data = json_encode($array, JSON_PRETTY_PRINT);
		if(file_put_contents('jsonDynamicData/inserted_jsonData_throguh_form.json', $json_data))
		{
			echo 'Data inserted in Json file.';
			//header('location:form_for_creating_jsonData.php')
		}
		else
		{
			echo 'Some error occured';
		}
	}
	else
	{
		echo 'Json file is not found. Please create a json file to save data.';
	}	

}
?>