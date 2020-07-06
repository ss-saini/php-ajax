<?php include('header.php'); ?>
<body id="dataTable">
<button id="btn">submit</button>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn").on("click", function(){
			$.ajax({
				url 	: "students.php",
				type	: "POST",
				success	: function(data){
					$("#dataTable").html(data);
				}
			});
		});
	});
</script>
<?php include('footer.php'); ?>