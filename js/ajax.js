$(document).ready(function() {
		function dataload(){
			$.ajax({
				url		: "stu_records_table.php",
				type	: "POST",
				success	: function(data){
					$("#dataTable").html(data);
				}
			});
		}
		dataload();

		$("#sub").on("click", function(e){
			e.preventDefault();
			var name 	= $("#name").val();
			var clas 	= $("#clas").val();
			var phone 	= $("#phone").val();
			var marks 	= $("#marks").val();
			if(name == "" || clas == "" || phone == "" || marks == ""){
				alert('Please enter the values in all fields !!!');
			}
			else
			{
			$.ajax({
				url		: "insert_data.php",
				type	: "POST",
				data 	: {st_name:name, st_class:clas, st_phone:phone, st_marks:marks},
				success	: function(data){
					if (data == 1 ) 
					{
						dataload();
						$("#sform").trigger("reset");						
					}
					else
					{
						alert("error");
					}

				}
			});
			}
		});

//delete records

	$(document).on("click", ".del", function(){
		if(confirm("Are you sure want to delete it?")){
			var stuId = $(this).val();
			var dell  = this;

			$.ajax({
				url		: "delete_record.php",
				type	: "POST",
				data 	: { id : stuId },
				success	: function(data){
					if(data == 1)
					{
						$(dell).closest("tr").fadeOut(1000);
					}
					else
					{
						alert('error');
					}
				}	
			});
		}	
	});

});

	//Update records
	$(document).on("click", "#update", function(e){
		e.preventDefault();
  		var stId 	= $('#hidid').val();
  		var stName 	= $('#upName').val();
  		var stClass = $('#upClass').val();
  		var stPhone = $('#upPhone').val();
  		var stMarks = $('#upMarks').val();

  		$.ajax({
  			url	 : "update_records_save.php",
  			type : "POST",
  			data : { s_id : stId, s_name : stName, s_class : stClass, s_phone : stPhone, s_marks : stMarks },
  			success :function(data){
  					if(data == 1)
  					{
  						$(location).attr('href', 'form.php');
  					}
  					else
  					{
  						alert(error);
  					}
  			} 
  		});
	});

	//Live search
	$("#search").on("keyup",function(){
		var searchValue = $(this).val();
		//alert(searchValue);

		$.ajax({
			url	 	: "live_search.php",
			type 	: "POST",
			data 	: { search : searchValue },
			success : function(data){
				$('#dataTable').html(data);
			}
		});
	});