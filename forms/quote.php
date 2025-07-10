<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Nếu dùng Composer:
// require '../vendor/autoload.php';

// Nếu không dùng Composer, hãy dùng các dòng sau thay thế dòng trên:
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

    // Gửi từ đâu
    $mail->setFrom('ngoquangminh1509@gmail.com', 'Website Quote Request');

    // Gửi đến đâu
    $mail->addAddress('minhhaihd.ltd@gmail.com');    // Email nhận yêu cầu báo giá

    // Lấy dữ liệu từ form
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    // Thiết lập tiêu đề email
    $mail->Subject = 'Yêu cầu báo giá từ website';

    // Nội dung email
    $mail->Body = "Bạn nhận được yêu cầu báo giá từ khách hàng:\n\n"
                . "Họ tên: $name\n"
                . "Email: $email\n"
                . "Số điện thoại: $phone\n"
                . "Nội dung yêu cầu:\n$message";

    // Gửi mail
    $mail->send();
    echo 'OK';  // Để validate.js biết là đã gửi thành công
} catch (Exception $e) {
    echo "Lỗi gửi mail: {$mail->ErrorInfo}";
}
?>