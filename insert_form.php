<?php
include('header.php');
?>
<body>
<div class="container">
	<form id="sform" name="sform">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Class</label>
      <input type="text" class="form-control" name="class" id="clas">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Phone</label>
      <input type="text" class="form-control" name="phone" id="phone">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Marks</label>
      <input type="text" class="form-control" name="marks" id="marks">
    </div>
  </div>
  <div class="subbtn">
  	<input type="submit" class="btn btn-primary" name="sub" id="sub">
  </div>
</form>
<center id = "dataTable"></center>
</div>	
<?php include('footer.php');?>

