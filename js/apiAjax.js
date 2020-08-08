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
							+"<button class='btn btn-danger rdelete' value='"+value.id+"'>Delete</button></td>"
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
						}, 4000);
		}
		else if(status == false){
				$('.error-mess').html(message).slideDown();
					setTimeout(function(){
						$('.error-mess').slideUp()
						}, 4000);
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
		var getId = $(this).val();			//student id geting form button 
		var obj = { sid: getId };			//converting id into in object form
		var jsonid = JSON.stringify(obj);	// object to json 

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
		var json_data = jsonData("#editRecord");
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

	//Delete records
	$(document).on("click", ".rdelete", function() {
		if(confirm("Are you really want to delete this record ??")){
			var sid = $(this).val();						//student id geting form button 
			var objData = { stId: sid };					//converting id into in object form
			var jsonData = JSON.stringify(objData);			// object to json 
			var row = this;

			$.ajax({
				url		: "http://localhost/phpajax/restAPIs/detete_record_api.php",
				type	: "POST",
				data 	: jsonData,
				success : function (data) {
					messages(data.message, data.status);
 					if(data.status == true){
						$(row).closest("tr").fadeOut();
					} 
				},
				error: function(xhr, status, error){
					var errorMessage = xhr.status + ': ' + xhr.statusText
					alert('Error - ' + errorMessage);
					}	
			});
		}
	});

	// search
	$(".search-input").on("keyup", function(){
		$('#tabBody').html("");
		var value  = $(this).val();
		var object = { sname: value };
		var json_value = JSON.stringify(object);
		if(json_value){
			$.ajax({
				url		: "http://localhost/phpajax/restAPIs/search_records_api.php",
				type	: "POST",
				data 	: json_value,
				success : function(data) {
					if(data.status == false){
						messages(data.message, data.status);
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
								+"<button class='btn btn-danger rdelete' value='"+value.id+"'>Delete</button></td>"
								+"</tr>");	
						});
					}				
				}
			});
		}
	})

	function loadCountry(selData, targetId) {
		$.ajax({
			url		: "dependent_select.php",
			type	: "POST",
			data 	: { selData: selData, targetId: targetId},	
			success : function(data) {
				if(selData == "city"){
					$("#city").html(data);
				}
				else if(selData == "state"){
						$("#state").html(data);
				}
				else
				{
					$("#country").append(data);					
				}
			}
		});
	}
	loadCountry();
	$("#country").on("change", function(){
		var countryId = $(this).val();
		loadCountry("state", countryId);		//passing state as a static value and selected country id
	});
	$("#state").on("change", function(){
		var stateId = $(this).val();
		loadCountry("city", stateId);	
	});
});