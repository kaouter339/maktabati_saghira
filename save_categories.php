<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_SESSION["child_id"])){
    echo json_encode(["status"=>"error","message"=>"child_id غير موجود في session"]);
    exit;
}

if(!isset($_POST["categories"])){
    echo json_encode(["status"=>"error","message"=>"categories ناقص"]);
    exit;
}

$child_id = $_SESSION["child_id"];
$categories = json_decode($_POST["categories"], true);

if(!is_array($categories) || count($categories)==0){
    echo json_encode(["status"=>"error","message"=>"لم يتم اختيار أي كاتيغوري"]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM children_categories WHERE children_id=?");
$stmt->bind_param("i", $child_id);
$stmt->execute();


foreach($categories as $cat_name){

    $stmt2 = $conn->prepare("SELECT id FROM categories WHERE name=?");
    $stmt2->bind_param("s", $cat_name);
    $stmt2->execute();
    $res = $stmt2->get_result();

    if($row = $res->fetch_assoc()){
        $cat_id = $row["id"];

        $stmt3 = $conn->prepare("INSERT INTO children_categories(children_id, category_id) VALUES(?,?)");
        $stmt3->bind_param("ii", $child_id, $cat_id);
        $stmt3->execute();
    }
}

echo json_encode(["status"=>"success","message"=>"تم حفظ الكاتيغوري"]);
?>
