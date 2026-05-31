<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

if(!isset($_POST["child_name"], $_POST["age"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["avatar"])){
    echo json_encode(["status"=>"error","message"=>"بيانات ناقصة"]);
    exit;
}

$child_name = trim($_POST["child_name"]);
$age = intval($_POST["age"]);
$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);
$avatar = trim($_POST["avatar"]);

if($child_name=="" || $age<=0 || $username=="" || $email=="" || $password=="" || $avatar==""){
    echo json_encode(["status"=>"error","message"=>"يرجى ملء جميع الحقول"]);
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(["status"=>"error","message"=>"البريد الإلكتروني غير صحيح"]);
    exit;
}


if(!preg_match("/@gmail\.com$/", $email) || $email !== strtolower($email)){
    echo json_encode(["status"=>"error","message"=>"الايميل خطأ يجب أن يكون @gmail.com"]);
    exit;
}

$parent_id = null;

$stmt = $conn->prepare("SELECT id, username, password FROM parents WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows > 0){

    
    $row = $res->fetch_assoc();

    
    if($username !== $row["username"]){
        echo json_encode(["status"=>"error","message"=>"اسم المستخدم خطأ"]);
        exit;
    }

    
    if(!password_verify($password, $row["password"])){
        echo json_encode(["status"=>"error","message"=>"كلمة المرور خاطئة"]);
        exit;
    }

    $parent_id = $row["id"];

}else{

    
    $stmtPass = $conn->prepare("SELECT password FROM parents");
    $stmtPass->execute();
    $resPass = $stmtPass->get_result();

    while($rowPass = $resPass->fetch_assoc()){
        if(password_verify($password, $rowPass["password"])){
            echo json_encode(["status"=>"error","message"=>"كلمة المرور موجودة مسبقا"]);
            exit;
        }
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt2 = $conn->prepare("INSERT INTO parents (username, email, password) VALUES (?, ?, ?)");
    $stmt2->bind_param("sss", $username, $email, $hashedPassword);

    if(!$stmt2->execute()){
        echo json_encode(["status"=>"error","message"=>"خطأ أثناء إنشاء حساب الأب"]);
        exit;
    }

    $parent_id = $conn->insert_id;
}

$stmtCheck = $conn->prepare("SELECT id FROM children WHERE child_name=? AND parent_id=?");
$stmtCheck->bind_param("si", $child_name, $parent_id);
$stmtCheck->execute();
$resCheck = $stmtCheck->get_result();

if($resCheck->num_rows > 0){
    echo json_encode(["status"=>"error","message"=>"هذا طفل موجود مسبقا"]);
    exit;
}


$stmt3 = $conn->prepare("INSERT INTO children (parent_id, child_name, age, avatar) VALUES (?, ?, ?, ?)");
$stmt3->bind_param("isis", $parent_id, $child_name, $age, $avatar);

if(!$stmt3->execute()){
    echo json_encode(["status"=>"error","message"=>"خطأ أثناء إنشاء الطفل"]);
    exit;
}

$child_id = $conn->insert_id;

$_SESSION["parent_id"] = $parent_id;
$_SESSION["child_id"] = $child_id;

echo json_encode([
    "status"=>"success",
    "message"=>"تم تسجيل الطفل بنجاح",
    "parent_id"=>$parent_id,
    "child_id"=>$child_id
]);
?>