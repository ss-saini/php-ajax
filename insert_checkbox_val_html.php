<?php include('header.php');?>
<div class="container">
    <div class="row"> 
        <div class="col-md-6">
            <div class="error-mess"></div>
            <div class="success-mess" ></div>    
            <div class="card card-primary">
                <h3>Inserting Checkbox value Ajax:</h3>
                <form class="" id="formsel">  
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name:</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="sname" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Math</label>
                        <div class="col-sm-6">
                        <input class="form-check-input subj" type="checkbox" value="math" id="defaultCheck1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Hindi</label>
                        <div class="col-sm-6">
                        <input class="form-check-input subj" type="checkbox" value="hindi" id="defaultCheck1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">English</label>
                        <div class="col-sm-6">
                        <input class="form-check-input subj" type="checkbox" value="english" id="defaultCheck1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">SST</label>
                        <div class="col-sm-6">
                        <input class="form-check-input subj" type="checkbox" value="sst" id="defaultCheck1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">SS</label>
                        <div class="col-sm-6">
                        <input class="form-check-input subj" type="checkbox" value="ss" id="defaultCheck1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button class="btn btn-primary" name="subbtn" id="subbtn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#formsel").submit(function(e){
            e.preventDefault();
            var name = $("#sname").val();
            var sub = [];

            $(".subj").each(function(){
                if($(this).is(":checked")){
                    sub.push($(this).val());
                }    
            });
            var subject = sub.toString();
            if(name != '' && sub.lenght !== 0){
                $.ajax({
                    url     : "insert_checkbox_value_code.php",
                    type    : "POST",
                    dataType: "json",
                    data    : { name: name, sub: subject },
                    success : function(data){
                        //console.log(data.status);
                        if(data.status == true){
                            $("#formsel").trigger('reset');
                            $(".success-mess").html(data.message).fadeIn();
                            setTimeout(function(){
                                $(".success-mess").fadeOut();
                            }, 2000);
                        }
                        else 
                        {
                            $(".error-mess").html(data.message).fadeIn();
                            setTimeout(function(){
                                $(".error-mess").fadeOut();
                            }, 2000);
                        }
                    }
                });
            }
            else
            {
                $(".error-mess").html("All Fields Are Required!!!").fadeIn();
                setTimeout(function(){
                    $(".error-mess").fadeOut();
                }, 2000);
            }
        });
    });
</script>