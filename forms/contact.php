<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Nếu dùng Composer
// require '../vendor/autoload.php';

// Nếu không dùng Composer và tải tay:
require '../assets/vendor/phpmailer/PHPMailer.php';
require '../assets/vendor/phpmailer/SMTP.php';
require '../assets/vendor/phpmailer/Exception.php';

$mail = new PHPMailer(true);

try {
    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';         // SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ngoquangminh1509@gmail.com';     // Tài khoản Gmail gửi đi
    $mail->Password   = 'prxy kfns dafh vnbm';      // App password từ Gmail (không phải mật khẩu Gmail)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Gửi mail từ đâu
    $mail->setFrom('ngoquangminh1509@gmail.com', 'Website Contact');

    // Gửi đến địa chỉ nhận
    $mail->addAddress('minhhaihd.ltd@gmail.com');  // Bạn nhận mail tại đây

    // Lấy dữ liệu từ form
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? 'Form liên hệ từ website';
    $message = $_POST['message'] ?? '';

    // Tiêu đề & nội dung
    $mail->Subject = $subject;
    $mail->Body    = "Bạn nhận được tin nhắn từ:\n\nHọ tên: $name\nEmail: $email\n\nNội dung:\n$message";

    // Gửi mail
    $mail->send();
    echo 'OK';  // Cho validate.js biết là đã thành công
} catch (Exception $e) {
    echo "Lỗi gửi mail: {$mail->ErrorInfo}";
}
?>