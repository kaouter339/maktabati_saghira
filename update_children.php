<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_POST["child_id"])){
    echo json_encode(["status"=>"error","message"=>"child_id غير موجود"]);
    exit;
}

$child_id = intval($_POST["child_id"]);
$newName = isset($_POST["child_name"]) ? trim($_POST["child_name"]) : "";
$newAvatar = isset($_POST["avatar"]) ? trim($_POST["avatar"]) : "";
$categories = isset($_POST["categories"]) ? $_POST["categories"] : "[]";

$categoriesArray = json_decode($categories, true);

if(!is_array($categoriesArray)){
    $categoriesArray = [];
}

if($newName != ""){
    $stmt = $conn->prepare("UPDATE children SET child_name=? WHERE id=?");
    $stmt->bind_param("si", $newName, $child_id);
    $stmt->execute();
}

if($newAvatar != ""){
    $stmt = $conn->prepare("UPDATE children SET avatar=? WHERE id=?");
    $stmt->bind_param("si", $newAvatar, $child_id);
    $stmt->execute();
}

$stmtDel = $conn->prepare("DELETE FROM children_categories WHERE children_id=?");
$stmtDel->bind_param("i", $child_id);
$stmtDel->execute();

foreach($categoriesArray as $catName){

    $catName = trim($catName);

    $stmtCat = $conn->prepare("SELECT id FROM categories WHERE name=?");
    $stmtCat->bind_param("s", $catName);
    $stmtCat->execute();
    $resCat = $stmtCat->get_result();

    if($resCat->num_rows > 0){
        $row = $resCat->fetch_assoc();
        $cat_id = $row["id"];

        $stmtIns = $conn->prepare("INSERT INTO children_categories (children_id, category_id) VALUES (?, ?)");
        $stmtIns->bind_param("ii", $child_id, $cat_id);
        $stmtIns->execute();
    }
}

echo json_encode(["status"=>"success","message"=>"تم تحديث الطفل بنجاح"]);
?>