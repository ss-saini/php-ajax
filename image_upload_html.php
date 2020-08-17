<?php include('header.php')?>
<div class="container">
    <div class="success-mess"></div>
    <div class="form">
        <form id="form">
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="File" name="file">
            </div>
            <input type="submit" class="btn btn-primary" name="uploadImg" id="upImg" value="Upload">
        </form>
    </div>
    <div class >
        <p>Image Type: jpg, jpeg, png, gif only</p>
    </div>
     <div id="viewimg"></div>
</div>

<script>
$(document).ready(function(){
    $("#form").on("submit", function(e){
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url         : "image_upload_code.php",
            type        : "POST",
            data        : formData,
            dataType    : "json",
            contentType : false,
            processData : false,
            success     : function (data) {
                //console.log(data);
                if(data.status == false){
                    $("#File").val('');
                }
                else
                {
                    $("#viewimg").append("<img src='"+ data +"'>"+ "</br></br>" + "<button class='btn btn-danger delimg' id='dlimage' value= '"+ data +"'>Delete</button>");
                    $("#File").val(''); 
                    $("#dlimage").click(function() {
                        if(confirm("Are you sure want to delete it ?")) {
                            var path = $(this).val();
                            $.ajax({
                                url     : "image_upload_code.php",
                                type    : "POST",
                                data    : { imgPath: path },
                                //dataType: "json",
                                success : function(data){
                                    //console.log(data);
                                    //$(".success-mess").append(data.message);
                                    $("#viewimg").hide();
                                }
                            });
                        }
                    }); 
                }
            }
        });
    });
});
</script>