<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
         body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

#wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

#form-register {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 400px;
}

.form-heading {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-input,
.form-select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.form-input:focus,
.form-select:focus {
    border-color: #007bff;
    outline: none;
}

.form-submit {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-bottom: 15px; /* Thêm thuộc tính này */
}

.form-submit:hover {
    background-color: #0056b3;
}

.form-link {
    text-align: center;
    display: block;
}

.form-link a {
    color: #007bff;
    text-decoration: none;
}

.form-link a:hover {
    text-decoration: underline;
}
    </style>
</head>
<?php
    session_start();
    include('../../xuly/connect.php');
    
    if (isset($_POST['dangky'])) {
        $con;
        $p = new clsKetnoi();
        $p->ketnoiDB($con);
    
        $user = mysqli_real_escape_string($con, $_POST['user']);
        $pass = mysqli_real_escape_string($con, $_POST['pass']);
        $role = mysqli_real_escape_string($con, $_POST['role']);
        $sdt = mysqli_real_escape_string($con, $_POST['sdt']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $hoten = mysqli_real_escape_string($con, $_POST['hoten']);
        $diachi = mysqli_real_escape_string($con, $_POST['diachi']);
    
        if (empty($user) || empty($pass) || empty($role) || empty($sdt) || empty($email) || empty($hoten) || empty($diachi)) {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin.')</script>";
            exit;
        }
    
        // Kiểm tra tên đăng nhập đã tồn tại chưa
        $query = "SELECT * FROM taikhoan WHERE user='$user'";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.')</script>";
            header('Location: ../../xuly/login.php');
            exit;
        }
    
        // Thêm người dùng mới vào cơ sở dữ liệu
        $insert_query = "INSERT INTO taikhoan (user, pass, role, sdt, email, hoten, diachi) 
                        VALUES ('$user', '$pass', '$role', '$sdt', '$email', '$hoten', '$diachi')";
      $insert_result = mysqli_query($con, $insert_query);
      if (!$insert_result) {
          die(mysqli_error($con)); // Hiển thị thông điệp lỗi nếu có lỗi xảy ra
      }
      
        
        
        if ($insert_result) {
            echo "<script>alert('Đăng ký thành công.')</script>";
        } else {
            echo "<script>alert('Đăng ký không thành công.')</script>";
        }
    }

    ?>
<body>
    <div id="wrapper">
        <form id="form-register" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h1 class="form-heading">Đăng ký</h1>
            <div class="form-group">
                <input id="user" name='user' type="text" class="form-input" placeholder="Tên đăng nhập">
            </div>
            <div class="form-group">
                <input id="pass" name='pass' type="password" class="form-input" placeholder="Mật khẩu">
            </div>
            <div class="form-group">
                <select id="role" name="role" class="form-select">
                    <option value="3">Lễ Tân</option>
                </select>
            </div>
            <div class="form-group">
                <input id="sdt" name='sdt' type="text" class="form-input" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <input id="email" name='email' type="email" class="form-input" placeholder="Email">
            </div>
            <div class="form-group">
                <input id="hoten" name='hoten' type="text" class="form-input" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input id="diachi" name='diachi' type="text" class="form-input" placeholder="Địa chỉ">
            </div>
            <div class="form-group">
        </form>
    <input name="dangky" type="submit" value="Đăng Ký" class="form-submit">
    <p class="form-link">Đã có tài khoản? <a href="../../xuly/login.php">Đăng nhập</a></p>
</div>

    </div>
    
</body>
</html>
