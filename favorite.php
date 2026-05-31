<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if (!isset($_SESSION["child_id"])) {
    echo json_encode(["status" => "error", "message" => "child_id غير موجود"]);
    exit;
}

if (!isset($_POST["book_id"])) {
    echo json_encode(["status" => "error", "message" => "book_id غير موجود"]);
    exit;
}

$child_id = intval($_SESSION["child_id"]);
$book_id = intval($_POST["book_id"]);

$check = $conn->prepare("SELECT id FROM favorites WHERE children_id=? AND book_id=?");
$check->bind_param("ii", $child_id, $book_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {

    $delete = $conn->prepare("DELETE FROM favorites WHERE children_id=? AND book_id=?");
    $delete->bind_param("ii", $child_id, $book_id);
    $delete->execute();

    echo json_encode(["status" => "removed"]);

} else {

    $insert = $conn->prepare("INSERT INTO favorites(children_id, book_id) VALUES(?, ?)");
    $insert->bind_param("ii", $child_id, $book_id);
    $insert->execute();

    echo json_encode(["status" => "added"]);
}
?>