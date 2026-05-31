<?php
session_start();
header("Content-Type: application/json");

$conn = new mysqli("localhost", "root", "", "maktabati_saghira");

if ($conn->connect_error) {
    exit;
}

if (!isset($_POST["child_id"])) {
    echo json_encode(["status"=>"error", "message"=>"child_id غير موجود"]);
    exit;
}

$child_id = intval($_POST["child_id"]);
$stmt1 = $conn->prepare("DELETE FROM children_categories WHERE children_id = ?");
$stmt1->bind_param("i", $child_id);

if (!$stmt1->execute()) {
    echo json_encode(["status"=>"error", "message"=>"فشل حذف العلاقات: " . $stmt1->error]);
    exit;
}

$stmt2 = $conn->prepare("DELETE FROM children WHERE id = ?");
$stmt2->bind_param("i", $child_id);

if ($stmt2->execute()) {
    echo json_encode(["status"=>"success", "message"=>"تم حذف الطفل بنجاح"]);
} else {
    echo json_encode(["status"=>"error", "message"=>"فشل حذف الطفل: " . $stmt2->error]);
}

$conn->close();
?>