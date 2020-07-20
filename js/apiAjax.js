$(document).ready(function(){
	// Fetch all records for database using api
	function recordTable(){
		$('#tabBody').html(""); //for empty loading table before loading new data
		$.ajax({
			url		: "http://localhost/phpajax/restAPIs/fetch_all_records_api.php",
			type	: "GET",
			success	: function(data){
				if(data.status == false){
					$('.els-msg').html("<b>" + data.message +" </b>");
				}
				else
				{
					//console.log(data);
					$.each(data, function(key,value){
						$('#tabBody').append("<tr>" 
							+"<td>" + value.id + "</td>"
							+"<td>" + value.name + "</td>"
							+"<td>" + value.class + "</td>"
							+"<td>" + value.phone + "</td>"
							+"<td>" + value.marks + "</td>"
							+"<td><button class='btn btn-info redit' value='"+value.id+"' data-toggle='modal' data-target='#exampleModal'>Edit</button>"+" | "
							+"<button class='btn btn-danger' value='"+value.id+"'>Delete</button></td>"
							+"</tr>");	
					});
				}
			}
		});
	}
	recordTable();

	//Function for converting for data into json data
	function jsonData(formId) {

		var aray = $(formId).serializeArray(); //converting form data into serialize array
		var object = {};							//converting serialize array into object
		for (var i = 0; i < aray.length; i++) {
			if(aray[i].value == '')
			{
				return false;
			}
			object[aray[i].name] = aray[i].value;
		}
		var objToJson = JSON.stringify(object); //converting object data to json data
		return objToJson;
	}

	//Function for showing success and error messages
	function messages(message, status) {
		if(status == true)
		{
			$('.success-mess').html(message).slideDown();
					setTimeout(function(){
						$('.success-mess').slideUp()
						}, 3000);
		}
		else if(status == false){
				$('.error-mess').html(message).slideDown();
					setTimeout(function(){
						$('.error-mess').slideUp()
						}, 3000);
			}
		}

	// Insert Records Using api

	$('#submitApi').on("click", function(e){
		e.preventDefault();
		var json_data = jsonData("#apiform");
		//console.log(json_data);
		if(json_data == false){
			messages("All fields are requird !!!", false);
		}
		else{
			$.ajax({
				url		: "http://localhost/phpajax/restAPIs/insert_record_api.php",
				type	: "POST",
				data 	: json_data,
				success : function(data) {
					messages(data.message, data.status);
					recordTable();
					$('#apiform').trigger("reset");
				}
			});
		}
	});

	// Edit Records using api
	$(document).on("click", ".redit", function(){
		var getId = $(this).val();
		var obj = { sid: getId };
		var jsonid = JSON.stringify(obj);

		$.ajax({
			url		: "http://localhost/phpajax/restAPIs/fetch_single_record_api.php",
			type	: "POST",
			data 	: jsonid,
			success	: function(record){
				$('#eid').val(record[0].id);
				$('#ename').val(record[0].name);
				$('#eclass').val(record[0].class);
				$('#ephone').val(record[0].phone);
				$('#emarks').val(record[0].marks);
			}
		});
	});

	//Update Records using api
	$('#eupadate').on("click", function(e){
		e.preventDefault();
		//var json_data = jsonData("#erecords");
		var json_data = jsonData("#editRecord");
		console.log(json_data);
		if(json_data == false){
			messages("All fields are requird !!!", false);
		}
		else{
			$.ajax({
				url		: "http://localhost/phpajax/restAPIs/update_records_api.php",
				type	: "POST",
				data 	: json_data,
				success : function(data) {
					messages(data.message, data.status);
					recordTable();
				}
			});
		}
	});

});