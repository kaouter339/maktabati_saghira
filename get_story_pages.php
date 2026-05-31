<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

if(!isset($_GET["book_id"])){
    echo json_encode([]);
    exit;
}

$book_id = intval($_GET["book_id"]);

$stmt = $conn->prepare("SELECT page_number, image, text, audio FROM story_pages WHERE book_id=? ORDER BY page_number ASC");
$stmt->bind_param("i", $book_id);
$stmt->execute();
$res = $stmt->get_result();

$pages = [];
while($row = $res->fetch_assoc()){
    $pages[] = $row;
}

echo json_encode($pages);
?>