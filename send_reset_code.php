<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
include "db.php";

use PHPMailer\PHPMailer\PHPMailer;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";

if(!isset($_POST["email"])){
    echo json_encode(["status"=>"error","message"=>"يرجى إدخال البريد الإلكتروني"]);
    exit;
}

$email = trim($_POST["email"]);

if($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(["status"=>"error","message"=>"البريد الإلكتروني غير صحيح"]);
    exit;
}


$sql = "SELECT id FROM parents WHERE email=?";
$stmt = $conn->prepare($sql);

if($stmt == false){
    echo json_encode(["status"=>"error","message"=>"خطأ SQL: ".$conn->error]);
    exit;
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    echo json_encode(["status"=>"error","message"=>"هذا البريد غير مسجل"]);
    exit;
}


$code = rand(100000, 999999);

$sql2 = "UPDATE parents SET reset_code=? WHERE email=?";
$stmt2 = $conn->prepare($sql2);

if($stmt2 == false){
    echo json_encode(["status"=>"error","message"=>"خطأ SQL: ".$conn->error]);
    exit;
}

$stmt2->bind_param("ss", $code, $email);
$stmt2->execute();


$_SESSION["reset_email"] = $email;
$_SESSION["reset_code"] = $code;
$_SESSION["reset_time"] = time();
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "";
$mail->Password = "";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->CharSet = "UTF-8";
$mail->setFrom("maktabatisaghira4@gmail.com", "مكتبتي الصغيرة");
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = "🔒 كود استرجاع كلمة المرور - مكتبتي الصغيرة";
$mail->Body = "
<h2>🔒 استرجاع كلمة المرور</h2>
<p>هذا هو كود الاسترجاع الخاص بك:</p>
<h1 style='color:#D8A7B1;'>$code</h1>
<p>إذا لم تطلب هذا، تجاهل الرسالة.</p>
";

if($mail->send()){
    echo json_encode(["status"=>"success","message"=>"تم إرسال الكود بنجاح"]);
    exit;
}else{
    echo json_encode(["status"=>"error","message"=>"فشل إرسال البريد: ".$mail->ErrorInfo]);
    exit;
}
?>
