<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_SESSION["parent_id"])){
    echo json_encode(["status"=>"error","message"=>"يجب تسجيل الدخول"]);
    exit;
}

$parent_id = $_SESSION["parent_id"];

$stmt = $conn->prepare("SELECT id, child_name, avatar FROM children WHERE parent_id=?");
$stmt->bind_param("i", $parent_id);
$stmt->execute();
$res = $stmt->get_result();

$children = [];
while($row = $res->fetch_assoc()){
    $children[] = $row;
}

echo json_encode(["status"=>"success","children"=>$children]);
?>