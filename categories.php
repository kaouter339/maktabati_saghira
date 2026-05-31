<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$result = $conn->query("SELECT id, name FROM categories");

$data = [];

while($row = $result->fetch_assoc()){
    $data[] = $row;
}

echo json_encode($data);
?>