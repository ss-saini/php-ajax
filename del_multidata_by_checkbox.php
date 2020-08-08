<?php include_once('header.php'); ?>
<div class="container">
    <center><u><h3>Delete Multiple Records Using Ajax Checkbox</h3></u></center>
    <div class = "dbtn">
        <button class="btn btn-danger delcheck">Delete</button>
    </div>    
    <div class="error-mess"></div>
    <div class="success-mess"></div>
    <table border="3" class="table table-striped table" >
        <tr>
            <th></th>
            <th>sr.no</th>
            <th>Name</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Marks</th>
        </tr>
        <tbody id="tbody"></tbody>
    </table>                
</div>
<script>
$(document).ready(function(){
    function loadData(){     
        $.ajax({
            url      : "phpCode_del_multidata_by_checkbox.php",
            type     : "GET",
            //dataType : "json",
            success : function(data){
            $.each(JSON.parse(data), function(key,value){
                $("#tbody").append("<tr>"
                +"<td><input type='checkbox' value= '"+value.id+"'></td>"
                +"<td>" + value.id + "</td>"
                +"<td>" + value.name + "</td>"
                +"<td>" + value.class + "</td>"
                +"<td>" + value.phone + "</td>"
                +"<td>" + value.marks + "</td>"
                +
                "</tr>");
                    //console.log(value.id);
                });
            }
        }); 
    }
    loadData();

    $(".delcheck").click(function(){
        var sid = [];
        $(":checkbox:checked").each(function(key){
            sid[key] = $(this).val();
        });
        if(sid.length == 0){
            alert("Please Select Atleast One Checkbox !!!");
        }
        else
        {
            if(confirm("Are you really want to delete this data ???")){
                $.ajax({
                    url     : "phpCode_del_multidata_by_checkbox.php",
                    type    : "POST",
                    dataType: "json",
                    data    : { stid:  sid },
                    success : function(data){
                        if(data.status == true){
                            $(".success-mess").html(data.message).fadeTo();
                            setTimeout(function(){
                                $(".success-mess").hide().fadeOut()
                            }, 2000);
                            $('#tbody').html("");
                            loadData();
                        }
                        else
                        {
                            $(".error-mess").html(data.message).fadeTo();
                            setTimeout(function(){
                                $(".error-mes").hide().fadeOut()
                            }, 2000);
                        }
                    }
                });
            }    
        }
    });
});
</script>