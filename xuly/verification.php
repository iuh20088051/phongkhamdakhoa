<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['verify'])) {
    $code = $_POST['code'];

    if (empty($code)) {
        $error = 'Mã xác nhận không được để trống';
    } elseif ($code != $_SESSION['code']) {
        $error = 'Mã xác nhận không đúng';
    } else {
        header('Location: reset_password.php');
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
    <title>Xác minh mã</title>
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
        #form-verify {
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
        <form id="form-verify" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h1 class="form-heading">Xác minh mã</h1>
            <?php if (!empty($error)) { ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php } ?>
            <div class="form-group">
                <input id="code" name="code" type="text" class="form-input" placeholder="Mã xác nhận">
            </div>
            <input class="form-submit" name="verify" type="submit" value="Xác minh">
        </form>
    </div>
</body>
</html>
