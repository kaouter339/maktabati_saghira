<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();

if(!isset($_POST["child_id"])){
    echo json_encode(["status"=>"error","message"=>"child_id ناقص"]);
    exit;
}

$_SESSION["child_id"] = intval($_POST["child_id"]);

echo json_encode([
    "status"=>"success",
    "child_id"=>$_SESSION["child_id"]
]);
?>