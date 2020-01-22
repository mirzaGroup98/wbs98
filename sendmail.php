<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['name'])) {

    $mail = new PHPMailer(true);

    try {

        $config = [
            'host' => 'smtp.gmail.com',
            'username' => 'mirzzateam@gmail.com',
            'password' => 'mirza1398',
            'port' => 587,
            'supportEmail' => 'mirzagroup98@gmail.com',
            'supportName' => "MirzaGroup"
        ];


        $fullName = isset($_POST['name']) ? $_POST['name'] : "حسن محبی";
        $email = isset($_POST['email']) ? $_POST['email'] : "hassan@gmail.com";
        $mobile = isset($_POST['phone']) ? $_POST['phone'] : "09127663512";
        $message = isset($_POST['message']) ? $_POST['message'] : 'سلام من یک سایت میخوام از آقای مرادمند';

        $mail->isSMTP();
        $mail->Host = $config['host'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['username'];
        $mail->Password = $config['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $config['port'];
        $mail->charSet = "UTF-8";

        $mail->setFrom($email, $config['supportName']);

        $mail->addAddress($config['supportEmail'], $config['supportName']);

        $mail->isHTML(false);

        $mail->Subject = 'Contact with our : ' . $email;


        $mail->Body = 'User Information:' . '
    ' . 'fullName = ' . $fullName . '
    ' . 'email = ' . $email . '
    ' . 'mobile = ' . $mobile . '
    ' . 'message = ' . $message . '
    date = ' . date('Y-m-d H:i:s');

        $mail->send();

        echo 'درخواست تماس شما با موفقیت ثبت شد ، در اولین فرصت همکاران بخش فنی با شما تماس خواهند گرفت.';
    } catch (Exception $e) {
        echo "در خواست شما ثبت شد و از طریق ایمیل به واحد فنی ارجاع گردیده است.";
    }

} else {
    header("Location: http://www.mirzateam.com");
}


