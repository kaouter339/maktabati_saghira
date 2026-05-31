<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_SESSION["child_id"])){
    echo json_encode(["status"=>"error","message"=>"لم يتم اختيار طفل"]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);
$stmt = $conn->prepare("
    SELECT category_id 
    FROM children_categories 
    WHERE children_id = ?
");
$stmt->bind_param("i", $child_id);
$stmt->execute();
$res = $stmt->get_result();

$catIds = [];
while($row = $res->fetch_assoc()){
    $catIds[] = $row["category_id"];
}

if(count($catIds) == 0){
    echo json_encode([]);
    exit;
}

$placeholders = implode(",", array_fill(0, count($catIds), "?"));
$types = str_repeat("i", count($catIds));


$sql = "SELECT id, title, image, description FROM books WHERE category_id IN ($placeholders)";
$stmt2 = $conn->prepare($sql);
$stmt2->bind_param($types, ...$catIds);
$stmt2->execute();
$res2 = $stmt2->get_result();

$books = [];
while($row = $res2->fetch_assoc()){
    $books[] = [
        "id_book" => $row["id"],
        "title" => $row["title"],
        "img" => $row["image"],
        "description" => $row["description"]
    ];
}

echo json_encode($books);
?>