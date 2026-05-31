<?php
include "db.php";

if(isset($_FILES["avatar"])){

    $folder = "uploads/";
    $fileName = time() . "_" . basename($_FILES["avatar"]["name"]);
    $path = $folder . $fileName;

    move_uploaded_file($_FILES["avatar"]["tmp_name"], $path);

    
}
?>