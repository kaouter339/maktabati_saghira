<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_SESSION["child_id"])){
    echo json_encode(["status"=>"error","message"=>"لم يتم اختيار طفل"]);
    exit;
}

$child_id = $_SESSION["child_id"];

$stmt = $conn->prepare("SELECT categories FROM children WHERE id=?");
$stmt->bind_param("i", $child_id);
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"الطفل غير موجود"]);
    exit;
}

$row = $res->fetch_assoc();

echo json_encode([
    "status"=>"success",
    "categories"=>$row["categories"]
]);
?>