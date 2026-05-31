<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

if(!isset($_SESSION["child_id"])){
    echo json_encode(["status"=>"error","message"=>"لم يتم تحديد الطفل"]);
    exit;
}

if(!isset($_POST["book_id"])){
    echo json_encode(["status"=>"error","message"=>"book_id ناقص"]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);
$book_id = intval($_POST["book_id"]);


$check = $conn->prepare("SELECT id FROM history WHERE child_id=? AND book_id=?");
$check->bind_param("ii", $child_id, $book_id);
$check->execute();
$check->store_result();

if($check->num_rows == 0){
    $stmt = $conn->prepare("INSERT INTO history(child_id, book_id) VALUES(?,?)");
    $stmt->bind_param("ii", $child_id, $book_id);
    $stmt->execute();
}

echo json_encode(["status"=>"success"]);
?>