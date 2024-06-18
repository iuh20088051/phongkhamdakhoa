<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Đăng nhập</title>
</head>
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
    
    #form-login {
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
    
    .form-group i {
        color: #fff;
        font-size: 14px;
        padding-top: 5px;
        padding-right: 10px;
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
    
    #eye i {
        padding-right: 0;
        cursor: pointer;
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
</style>
<?php
//Khai báo sử dụng session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('connect.php');
$con;
$p = new clsKetnoi();
$p -> ketnoiDB($con);

include_once 'test.php';
$mail = new Mailer();
$user = new App();
//Lấy dữ liệu nhập vào
$user = addslashes($_POST['user']);
$pass = addslashes($_POST['pass']);
  
  
//Lấy mật khẩu trong database ra
// $row = mysqli_fetch_array($result);
  
// //So sánh 2 mật khẩu có trùng khớp hay không
// if ($password != $row['password']) {
// echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
// exit;
// }
  
//Lưu tên đăng nhập
// $_SESSION['username'] = $username;
// echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
// die();
// $connect->close();
}
?>
<body>
    <div id="wrapper">
        <form id="form-login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h1 class="form-heading">Nhập email</h1>
            <div class="form-group">
                
                <input id="email" name='email' type="email" class="form-input" placeholder="email">
             
                </div>
            </div>
            <input name="dangnhap" type="submit" value="gửi">
        </form>
    </div>
</body>

</html>