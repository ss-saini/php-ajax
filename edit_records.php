<?php
include('conn.php');
include('header.php');

$sid = $_GET['id'];
$query="SELECT * FROM `students` WHERE id = '$sid'";
$res=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($res);?>

<div class="container">
	<form id="sform" name="sform">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" id="upName" class="form-control" value="<?php echo $row['name']; ?>">
      <input type="hidden" class="form-control" id="hidid" value="<?php echo $row['id']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Class</label>
      <input type="text" class="form-control" id="upClass" name="class" value="<?php echo $row['class']; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Phone</label>
      <input type="text" class="form-control" id="upPhone" name="phone" value="<?php echo $row['phone']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Marks</label>
      <input type="text" class="form-control" id="upMarks" name="marks" value="<?php echo $row['marks']; ?>">
    </div>
  </div>
  <div class="subbtn">
  	<input type="submit" class="btn btn-primary update" name="update" id="update" value="Update">
  	<a href="insert_form.php" class="btn btn-info">Cancel</a>
  </div>
</form>
</div>	

<?php
include('footer.php');
?>