<?php
header("Content-Type: application/json; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

if(!isset($_POST["email"])){
    echo json_encode(["status"=>"error","message"=>"يرجى إدخال البريد الإلكتروني"]);
    exit;
}

$email = trim($_POST["email"]);

if($email == ""){
    echo json_encode(["status"=>"error","message"=>"يرجى إدخال البريد الإلكتروني"]);
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(["status"=>"error","message"=>"البريد الإلكتروني غير صحيح"]);
    exit;
}

$code = rand(100000, 999999);

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;

$mail->Username = "";

$mail->Password = "";

$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->setFrom("maktabatisaghira4@gmail.com", "مكتبتي الصغيرة");
$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = "🔒 استرجاع كلمة المرور";
$mail->Body = "
    <h2>🔒 استرجاع كلمة المرور</h2>
    <p>هذا هو كود الاسترجاع:</p>
    <h1 style='color:#D8A7B1;'>$code</h1>
    <p>إذا لم تطلب هذا تجاهل الرسالة.</p>
";

$mail->send();

echo json_encode([
    "status"=>"success",
    "message"=>"تم إرسال الكود إلى بريدك الإلكتروني"
]);
?>
