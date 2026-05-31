<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if (!isset($_SESSION["child_id"])) {
    echo json_encode([]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);

$stmt = $conn->prepare("SELECT book_id FROM favorites WHERE children_id=?");
$stmt->bind_param("i", $child_id);
$stmt->execute();
$res = $stmt->get_result();

$favs = [];

while ($row = $res->fetch_assoc()) {
    $favs[] = intval($row["book_id"]);
}

echo json_encode($favs);
?>