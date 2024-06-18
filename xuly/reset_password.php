<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=UTF-8');

include('connect.php');
$con;
$p = new clsKetnoi();
$p->ketnoiDB($con);

if (isset($_POST['reset'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($new_password) || empty($confirm_password)) {
        $error = 'Vui lòng nhập đầy đủ thông tin';
    } elseif ($new_password != $confirm_password) {
        $error = 'Mật khẩu xác nhận không khớp';
    } else {
        $email = $_SESSION['email'];
        // Không cần mã hóa mật khẩu mới ở đây
        // $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        // Update mật khẩu mới trực tiếp vào cơ sở dữ liệu
        $query = "UPDATE taikhoan SET pass='$new_password' WHERE email='$email'";
        mysqli_query($con, $query);

        unset($_SESSION['email']);
        unset($_SESSION['code']);

        echo "<script>alert('Mật khẩu của bạn đã được thay đổi thành công');</script>";
        header('Location: login.php');
        exit();
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
    <title>Đặt lại mật khẩu</title>
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
        #form-reset {
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
        <form id="form-reset" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 class="form-heading">Đặt lại mật khẩu</h1>
            <?php if (!empty($error)) { ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>
            <div class="form-group">
                <input id="new_password" name="new_password" type="password" class="form-input" placeholder="Mật khẩu mới">
            </div>
            <div class="form-group">
                <input id="confirm_password" name="confirm_password" type="password" class="form-input" placeholder="Xác nhận mật khẩu">
            </div>
            <input class="form-submit" name="reset" type="submit" value="Đặt lại mật khẩu">
        </form>
    </div>
</body>
</html>
