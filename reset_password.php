<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_POST["email"], $_POST["code"], $_POST["new_password"])){
    echo json_encode(["status"=>"error","message"=>"بيانات ناقصة"]);
    exit;
}

$email = trim($_POST["email"]);
$code = trim($_POST["code"]);
$new_password = trim($_POST["new_password"]);

if($email=="" || $code=="" || $new_password==""){
    echo json_encode(["status"=>"error","message"=>"يرجى ملء جميع الحقول"]);
    exit;
}

if(!isset($_SESSION["reset_email"], $_SESSION["reset_code"], $_SESSION["reset_time"])){
    echo json_encode(["status"=>"error","message"=>"لا يوجد طلب استرجاع حاليا"]);
    exit;
}

if($email !== $_SESSION["reset_email"]){
    echo json_encode(["status"=>"error","message"=>"البريد لا يطابق طلب الاسترجاع"]);
    exit;
}

if($code != $_SESSION["reset_code"]){
    echo json_encode(["status"=>"error","message"=>"الكود غير صحيح"]);
    exit;
}

if(time() - $_SESSION["reset_time"] > 600){
    echo json_encode(["status"=>"error","message"=>"انتهت صلاحية الكود"]);
    exit;
}

$hashed = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "UPDATE parents SET password=?, reset_code=NULL WHERE email=?";
$stmt = $conn->prepare($sql);

if($stmt == false){
    echo json_encode(["status"=>"error","message"=>"خطأ SQL: ".$conn->error]);
    exit;
}

$stmt->bind_param("ss", $hashed, $email);

if($stmt->execute()){
    unset($_SESSION["reset_email"]);
    unset($_SESSION["reset_code"]);
    unset($_SESSION["reset_time"]);

    echo json_encode(["status"=>"success","message"=>"تم تغيير كلمة المرور بنجاح"]);
    exit;
}else{
    echo json_encode(["status"=>"error","message"=>"فشل تحديث كلمة المرور"]);
    exit;
}
?>