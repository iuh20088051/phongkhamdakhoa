<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <title>Giao Diện Của Lễ Tân</title>
    <style>
    .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        .menu-item {
            float: left;
        }

        .menu-item a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .menu-item a:hover {
            background-color: #111;
        }

        .user-info {
            float: right;
            color: white;
            padding: 14px 16px;
        }
    </style>
</head>
<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();

class clsKetnoi {
    function ketnoiDB(&$connect) {
        $connect = mysqli_connect('localhost', 'root', '', 'phongkhamdakhoa') or die('Không thể kết nối tới database');
        mysqli_set_charset($connect, 'UTF8');
        if ($connect === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
    }
}
// Tạo đối tượng kết nối từ lớp clsKetnoi
$objKetnoi = new clsKetnoi();

// Biến để lưu trữ kết nối CSDL
$conn = null;

// Gọi phương thức ketnoiDB để kết nối CSDL
$objKetnoi->ketnoiDB($conn);


// Lấy tên đăng nhập từ session
$loggedInUser = $_SESSION['user'];

$sql = "SELECT hoten FROM taikhoan WHERE user = '$loggedInUser'";
$result = $conn->query($sql);

$hoten = "Người dùng";

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hoten = $row['hoten'];
        $_SESSION['hoten'] = $hoten;
    }
} else {
    echo "Lỗi truy vấn: " . $conn->error;
}
$conn->close();
?>
<body>
    <!-- Thanh menu -->
    <ul class="menu">
    <li class="menu-item"><a href="../admin/lapphieukham.php">Lập Phiếu Khám</a></li>
        <li class="menu-item"><a href="../admin/themxoasua.php">Xem Thông Tin Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/Laphoadon.php">Lập Hóa Đơn Bệnh Nhân</a></li>
        <li class="menu-item"><a href="../admin/dangky.php">Đăng Ký Tài Khoản</a></li>
        <li class="menu-item"><a href="../../xuly/login.php">Đăng xuất</a></li>

        <div class="user-info">Lễ Tân <?php echo htmlspecialchars($hoten); ?></div>
    </ul>
    <h1 style="text-align: center;">Chào mừng đã trở lại!!</h1>
    <img style="height: 50%;width: 50%;align-items: center;display: block;margin-left: auto;margin-right: auto;" src="../../image/trangchubs.png">
</body>

</html>