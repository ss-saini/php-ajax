$(document).ready(function() {
		function dataload(){
			$.ajax({
				url		: "students.php",
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
				url		: "inser_data_ajax.php",
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
