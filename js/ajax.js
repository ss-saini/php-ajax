$(document).ready(function() {
	//load/get all data from database
/*		function dataload(){
			$.ajax({
				url		: "stu_records_table.php",
				type	: "POST",
				success	: function(data){
					$("#dataTable").html(data);
				}
			});
		}
		dataload();*/

	//load/get data with pagination
		function dataload(page){
			$.ajax({
				url		: "stu_records_table.php",
				type	: "POST",
				data 	: { page_no : page },
				success	: function(data){
					$("#dataTable").html(data);
				}
			});
		}
		dataload();

	//Pagination
		$(document).on("click",".pagination li a", function(e){
			e.preventDefault();
			var page_id = $(this).attr("id");
			dataload(page_id);
		});	

	//insertion of data (form functionality)
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
	if(searchValue){
		$.ajax({
			url	 	: "live_search.php",
			type 	: "POST",
			data 	: { search : searchValue },
			success : function(data){
				$('#dataTable').html(data);
			}
		});
	}
	else
	{
		$(location).attr('href', 'form.php');
	}
});

//Pagination through load more button
$(document).ready(function(){
	function loadTable(page)
	{
		$.ajax({
			url	 	: "load_more_pagination.php",
			type 	: "POST",
			data 	: { page_no : page },
			success : function(data){
				if(data){
					$("#pagibtn").remove();
					$("#tableData").append(data)
				}
				else
				{
					$(".lodmore").html("Finshed").css("background-color", "gray");
					$(".lodmore").prop("disabled", true);
				}
			},
			error: function(xhr, status, error){
         	var errorMessage = xhr.status + ': ' + xhr.statusText
         	alert('Error - ' + errorMessage);
     		}
		});
	}
	loadTable();
	$(document).on("click", ".lodmore", function(){
		var lastRecord = $(this).data("id");
		loadTable(lastRecord);
	});
});