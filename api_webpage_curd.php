<?php
include('header.php');
?>
<div class="container">
<div class="error-mess"></div>
<div class="success-mess" ></div>   
  <hr class="line">
	<form id="apiform" name="sform">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Class</label>
      <input type="text" class="form-control" name="class">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Phone</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Marks</label>
      <input type="text" class="form-control" name="marks">
    </div>
  </div>
  <div class="subbtn">
  	<input type="submit" class="btn btn-primary" name="subapi" id="submitApi">
  </div>
</form>
  <hr>
<!--   <div class="search-box"> 
    <b>Search:</b><input type="text" name="search" id="search" class="search">
  </div> -->
  <div class="els-msg"></div>
  <table class="table table-striped" border="2">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Phone</th>
      <th scope="col">Marks</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id ="tabBody"></tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editRecord">
          <div class="form-group">
            <label for="name" class="col-form-label">Name:</label>
            <input type="hidden" class="form-control" id="eid" name="eid">
            <input type="text" class="form-control" id="ename" name="ename">
          </div>
          <div class="form-group">
            <label for="class" class="col-form-label">Class:</label>
            <input type="text" class="form-control" id="eclass" name="eclass">
          </div>
          <div class="form-group">
            <label for="phone" class="col-form-label">Phone:</label>
            <input type="text" class="form-control" id="ephone" name="ephone">
          </div>
          <div class="form-group">
            <label for="marks" class="col-form-label">Marks:</label>
            <input type="text" class="form-control" id="emarks" name="emarks">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" name="update" data-dismiss="modal" id="eupadate">Submit</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php include('footer.php');?>
