<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if (!isset($_SESSION["child_id"])) {
    echo json_encode(["status" => "error", "message" => "لم يتم اختيار طفل"]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);

$sql = "SELECT DISTINCT b.id AS id_book, b.title, b.image
        FROM books b
        INNER JOIN children_categories cc ON b.category_id = cc.category_id
        WHERE cc.children_id = ?";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(["status" => "error", "message" => "SQL ERROR: " . $conn->error]);
    exit;
}

$stmt->bind_param("i", $child_id);
$stmt->execute();
$result = $stmt->get_result();

$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = [
        "id_book" => $row["id_book"],
        "title" => $row["title"],
        "img" => $row["image"]   
    ];
}

echo json_encode($books);
?>