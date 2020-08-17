<?php
if($_FILES['file']['name'] != ''){
    $filename = $_FILES['file']['name'];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $arr = ["jpeg", "jpg", "png","gif"];
    if(in_array($extension, $arr)){
        $new_name = rand().".".$extension;
        $path = "images/".$new_name;

        if($img = move_uploaded_file($filename = $_FILES['file']['tmp_name'], $path)){
            echo json_encode($path);
        }
    }
    else
    {
        echo json_encode(["message"=>"Entered File Formate is Invalid", "status"=>false]);
    }
}
else 
{
    echo json_encode(["message"=>"Please Select image", "status"=>false]);
}

if(!empty($_POST['imgPath'])){
    if(unlink($_POST['imgPath'])){
        //echo json_encode(array("message"=> "Image deleted successfully", "status"=>true));
        echo 1;
    }
}
