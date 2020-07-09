<?php include_once('header.php');?>
<div class="container">
	<div class="json-data">
		
	</div>
</div>	
<?php include_once('footer.php');?>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url		: "https://jsonplaceholder.typicode.com/posts",
			type 	: "GET",
			success : function(data){
				$.each(data, function(key,value){
				$(".json-data").append("<b>Id:</b> " + value.id + "<br>" +"<b>Title:</b> "+ value.title + "<br>" +"<b>Body:</b> "+ value.body +  "<br>"+ "<hr>");

				});
			}
		});
	});
</script>