<?php include('header.php');?>
<div class="container">
  <hr class="line">
	<form method="POST" action="saving_jsonform_data.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" name="name"  class="form-control" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="class">Class</label>
      <input type="text" class="form-control" name="class" required="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" name="phone" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="marks">Marks</label>
      <input type="text" class="form-control" name="marks" required="">
    </div>
  </div>
  <div class="subbtn">
  	<input type="submit" class="btn btn-primary" name="submit">
  </div>
</form>
  <hr>
</div>  
<?php include('footer.php');?>