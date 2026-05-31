<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_GET["term"])){
    echo json_encode([]);
    exit;
}

$term = trim($_GET["term"]);

if($term == ""){
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT id AS id_book, title, image AS img FROM books WHERE title LIKE ?");
$like = $term . "%";
$stmt->bind_param("s", $like);
$stmt->execute();

$res = $stmt->get_result();
$books = [];

while($row = $res->fetch_assoc()){
    $books[] = $row;
}

echo json_encode($books);
?>