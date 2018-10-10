<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gửi email thông qua SMTP google trong PHP</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="main">
    <h1>Gửi email thông qua google smtp</h1>
    <div id="login">
        <h2>Gmail SMTP</h2>
        <hr/>
        <form action="gui_email_smtp.php" method="post">
            <input type="text" placeholder="Vui lòng nhập email của bạn" name="email"/>
            <input type="password" placeholder="Mật khẩu" name="password"/>
            <input type="text" placeholder="To : Email của bạn " name="toid"/>
            <input type="text" placeholder="Subject : " name="subject"/>
            <textarea rows="4" cols="50" placeholder="Vui lòng nhập nội dung email ..." name="message"></textarea>
            <input type="submit" value="Gửi" name="send"/>
        </form>
    </div>
</div>
<?php
require 'PHPMailerAutoload.php';
if(isset($_POST['send']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $to_id = $_POST['toid'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
	$mail->From = "phucph62@wru.vn";
	$mail->FromName = "Hồng Phúc";
    $mail->Username = $email;
    $mail->Password = $password;
    $mail->addAddress($to_id);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    if (!$mail->send()) {
        $error = "Mailer Error: " . $mail->ErrorInfo;
        echo '<p id="para">'.$error.'</p>';
    }
    else {
        echo '<p id="para">Message đã gửi!</p>';
    }
}
else{
    echo '<p id="para">Vui lòng nhập đúng thông tin</p>';
}
?>
</body>
</html>