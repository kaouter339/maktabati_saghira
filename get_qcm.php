<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

if(!isset($_GET["book_id"])){
    echo json_encode([]);
    exit;
}

$book_id = intval($_GET["book_id"]);

$sql = "SELECT question, option1, option2, option3, answer 
        FROM qcm 
        WHERE book_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();

$result = $stmt->get_result();
$qcms = [];

while($row = $result->fetch_assoc()){
    $qcms[] = $row;
}

echo json_encode($qcms);
?>