<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

if($username=="" || $email=="" || $password==""){
    echo json_encode(["status"=>"error","message"=>"يرجى ملء جميع الحقول"]);
    exit;
}


if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(["status"=>"error","message"=>"البريد الإلكتروني غير صحيح"]);
    exit;
}


$stmt = $conn->prepare("SELECT id, password FROM parents WHERE username=? AND email=?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"الحساب غير موجود"]);
    exit;
}

$parent = $res->fetch_assoc();


if(!password_verify($password, $parent["password"])){
    echo json_encode(["status"=>"error","message"=>"كلمة المرور خاطئة"]);
    exit;
}

$parent_id = $parent["id"];


$stmt2 = $conn->prepare("SELECT id, child_name, age, avatar FROM children WHERE parent_id=?");
$stmt2->bind_param("i", $parent_id);
$stmt2->execute();
$res2 = $stmt2->get_result();

$children = [];
while($row = $res2->fetch_assoc()){
    $children[] = $row;
}

$_SESSION["parent_id"] = $parent_id;

echo json_encode([
    "status"=>"success",
    "parent_id"=>$parent_id,
    "children"=>$children
]);
?>
