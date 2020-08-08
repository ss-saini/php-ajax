<?php
include('header.php');
include('conn.php');
?>
<div class="container">
    <div class="row"> 
      <div class="col-md-6">
        <div class="error-mess"></div>
        <div class="success-mess" ></div>    
        <div class="card card-primary">
          <h3>Student Addmision Form:</h3>
            <form class="seralize" id="serialForm">  
              <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Name:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" id="snane" placeholder="Name">
                </div>
              </div>
              <div class="form-group row">
                <label for="fname" class="col-sm-4 col-form-label">S/o:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="fname" id="fname" placeholder="S/o">
                </div>
              </div>
              <div class="form-group row">
                <label for="age" class="col-sm-4 col-form-label">Age:</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                </div>
              </div>
              <div class="form-group row std">
                <label for="age" class="col-sm-4 col-form-label">Std:</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="std" id="std" placeholder="std">
                </div>
              </div>  
              <div class="form-group row">
                <label for="dobirth" class="col-sm-4 col-form-label">Date of birth:</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" name="dob" id="dob">
                </div>
              </div>
              <div class="form-group row">
                <label for="dobirth" class="col-sm-4 col-form-label" >Date of Addmision:</label>
                <div class="col-sm-6">
                  <input type="date" class="form-control" name="doa" id="doa" value="<?php $date = date('Y-m-d'); echo $date; ?>">
                </div>
              </div>
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-4 pt-0">Adminsion Type:</legend>
                  <div class="col-sm-8">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admisonTyp" id="sess" value="sessionly">
                      <label class="form-check-label" for="gridRadios1">
                       From New Session
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="admisonTyp" id="inter" value="intermediatly">
                      <label class="form-check-label" for="gridRadios2">
                        From Intermediate
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="button" class="btn btn-primary" name="save" id="serSub">Submit</button>
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="col-md-6">    
        <div class="card card-primary">
          <h3>Dependent Select Box:</h3>
            <form class="" id="">  
              <div class="form-group row">
                <label for="country" class="col-sm-4 col-form-label">Country:</label>
                <div class="col-sm-6">
                 <select class="form-control" name="country" id="country" class="opt">
                    <option value="">Select Country</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="state" class="col-sm-4 col-form-label">State:</label>
                <div class="col-sm-6">
                  <select class="form-control" name="state" id="state">
                    <option value="">Select State</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="state" class="col-sm-4 col-form-label">City:</label>
                <div class="col-sm-6">
                  <select class="form-control" name="city" id="city">
                    <option value="">Select City</option>
                  </select>
                </div>
              </div>
              
<!--               <div class="form-group row">
                <div class="col-sm-10">
                  <button type="button" class="btn btn-primary" name="save" id="serSub">Submit</button>
                </div>
              </div> -->
            </form>
        </div>
      </div>
    </div>
</div>

<?php include('footer.php');?>