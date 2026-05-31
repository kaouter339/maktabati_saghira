<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

if(!isset($_SESSION["child_id"])){
    echo json_encode(["status"=>"error","message"=>"لم يتم اختيار طفل"]);
    exit;
}

if(!isset($_POST["book_id"], $_POST["score"])){
    echo json_encode(["status"=>"error","message"=>"بيانات ناقصة"]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);
$book_id = intval($_POST["book_id"]);
$score = intval($_POST["score"]);

$stmt = $conn->prepare("INSERT INTO history (children_id, book_id, score) VALUES (?, ?, ?)");
if(!$stmt){
    echo json_encode(["status"=>"error","message"=>"SQL ERROR: ".$conn->error]);
    exit;
}

$stmt->bind_param("iii", $child_id, $book_id, $score);

if($stmt->execute()){
    echo json_encode(["status"=>"success"]);
}else{
    echo json_encode(["status"=>"error","message"=>"SQL Error: ".$stmt->error]);
}
?>