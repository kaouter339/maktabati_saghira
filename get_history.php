<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_SESSION["parent_id"])){
    echo json_encode(["status"=>"error","message"=>"لم يتم تسجيل الدخول"]);
    exit;
}

if(!isset($_GET["child_id"])){
    echo json_encode(["status"=>"error","message"=>"child_id ناقص"]);
    exit;
}

$parent_id = intval($_SESSION["parent_id"]);
$child_id = intval($_GET["child_id"]);

$check = $conn->prepare("SELECT id FROM children WHERE id=? AND parent_id=?");
$check->bind_param("ii", $child_id, $parent_id);
$check->execute();
$r = $check->get_result();

if($r->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"هذا الطفل لا ينتمي لهذا الأب"]);
    exit;
}

$stmt = $conn->prepare("
SELECT b.id AS id_book, b.title, b.image, h.read_date
FROM history h
JOIN books b ON b.id = h.book_id
WHERE h.child_id = ?
ORDER BY h.read_date DESC
");

$stmt->bind_param("i", $child_id);
$stmt->execute();
$res = $stmt->get_result();

$stories = [];
while($row = $res->fetch_assoc()){
    $stories[] = $row;
}

echo json_encode(["status"=>"success","stories"=>$stories]);
?>