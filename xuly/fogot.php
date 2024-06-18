<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer{
    public function sendMail($title, $content, $addressMail){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Charset = 'utf-8';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vanhoa4122002@gmail.com';
            $mail->Password = 'jweygdfxzlwxumky';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('vanhoa4122002@gmail.com', 'Hóa');
            $mail->addAddress($addressMail);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $content;

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=UTF-8');

include('connect.php');
$con;
$p = new clsKetnoi();
$p->ketnoiDB($con);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    if (empty($email)) {
        $error = 'Email không được để trống';
    } else {
        $query = "SELECT * FROM taikhoan WHERE email='$email'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $code = substr(rand(0, 999999), 0, 6);
            $title = "Quên mật khẩu";
            $content = "Mã xác nhận của bạn là: <span style='color:green'>" . $code . "</span>";

            $mailer = new Mailer();
            $mailer->sendMail($title, $content, $email);

            $_SESSION['email'] = $email;
            $_SESSION['code'] = $code;

            header('Location: verification.php');
            exit();
        } else {
            $error = 'Email không tồn tại';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Quên mật khẩu</title>
    <style>
        body {
            background: url('../images/bg.jpeg');
            background-size: cover;
            background-position-y: -80px;
            font-size: 16px;
        }
        #wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #form-forgot {
            max-width: 400px;
            background: rgba(0, 0, 0, 0.8);
            flex-grow: 1;
            padding: 30px 30px 40px;
            box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
        }
        .form-heading {
            font-size: 25px;
            color: #f5f5f5;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            border-bottom: 1px solid #fff;
            margin-top: 15px;
            margin-bottom: 20px;
            display: flex;
        }
        .form-input {
            background: transparent;
            border: 0;
            outline: 0;
            color: #f5f5f5;
            flex-grow: 1;
        }
        .form-input::placeholder {
            color: #f5f5f5;
        }
        .form-submit {
            background: transparent;
            border: 1px solid #f5f5f5;
            color: #fff;
            width: 100%;
            text-transform: uppercase;
            padding: 6px 10px;
            transition: 0.25s ease-in-out;
            margin-top: 30px;
        }
        .form-submit:hover {
            border: 1px solid #54a0ff;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <form id="form-forgot" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 class="form-heading">Quên mật khẩu</h1>
            <?php if (!empty($error)) { ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>
            <div class="form-group">
                <input id="email" name="email" type="text" class="form-input" placeholder="Email">
            </div>
            <input class="form-submit" name="submit" type="submit" value="Gửi">
        </form>
    </div>
</body>
</html>
